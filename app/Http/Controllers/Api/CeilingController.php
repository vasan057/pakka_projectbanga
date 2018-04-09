<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\MandiDailyPrice;
use App\Model\UserMandiMapping;
use App\Model\MandiCeilingPriceDaily;
use Validator;
use App\Library\General;
use App\Model\UsersBasic;
class CeilingController extends Controller
{
    public function getView(Request $rquest,$user_id){

        $user = UsersBasic::find($user_id);
        if($user->roles_id != '4'){
            $mandis = [];
            $user_mandi_map = UserMandiMapping::where(['user_id'=>$user->id,'active'=>'1'])->get();
            foreach($user_mandi_map as $mandi_map){
                $mandis[] = $mandi_map->mandi_id;
                // $daily_price = MandiDailyPrice::firstOrCreate(['mandi_id'=>$mandi_map->mandi_id,'date'=>date('Y-m-d')]);
            }
            $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d')])->with('ceiling')->with('user')
                                        ->with('mandi.location')
                                        ->whereIn('mandi_id',$mandis)
                                        ->whereHas('ceilingHistory',function($q){

                                        })
                                        ->with('ceilingHistory')
                                        ->get();
        }else{
            $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->with('ceiling')->with('user')->with('mandi.location')->get();
        }
        $min = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->min('min');
        $freezze = $ceilings->sum('isFrozen');
        $avg =0;
        $modal = 0;
        $suggest = 0;
        if($freezze){
            $freezze = '1';
        }else{
            $freezze = '0';
        }
        foreach ($ceilings as $ceiling){
            $avg =0;
            $modal = 0;
            $suggest =$ceiling->quantity;
            $mandi = $ceiling->mandi;
            $agmark = false;
            $agmark_net = false;
            if($mandi) $agmark = $mandi->agmark;
            if($agmark){
                $agmark_net = $agmark->agmarknet();
                $_data = $agmark_net->orderBy('date_arrival','desc')->limit(7)->get();
               $mandi_orders = $mandi->orders()->where('order_price','>',0)
                                            ->where('status',2)
                                            ->orderBy('order_date','desc')->limit(7)->get();
                $arr = array();
                $modal_arr = array();
                $total_min_buying = 0;
                foreach($mandi_orders as $mandi_order){
                    $arr[] = $mandi_order->order_price;
                }      
                foreach($_data as $modal_avg){
                    $modal_arr[] = $modal_avg->modal;
                }                     
                if(count($arr)) $total_min_buying = array_sum($arr) / count($arr);
                if(count($modal_arr)) $modal = array_sum($modal_arr) / count($modal_arr);

                $avg = round($total_min_buying,2,2);
                $modal = round($modal,2,2);
            } 
            if($avg){
                $suggest = min($min,$avg,$modal)>0?min($min,$avg,$modal):$min;
            }else{
                $suggest = min($min,$modal)>0?min($min,$modal):$min;
            }
            $ceiling->avg = $avg;
            $ceiling->modal = $modal;
            $ceiling->suggest = $suggest;
        }
        $ceilings_count = count($ceilings);
       $notify_count = 0;
       $notified = 'no';
       foreach($ceilings as $ceiling){
           if(isset($ceiling->ceiling->notified_time) && $ceiling->ceiling->notified_time) ++$notify_count;
       }
       if($notify_count > 0 ) $notified = 'yes';
        return response()->json(['success'=>$ceilings,'min'=>$min,'avg'=>$avg,'modal'=>$modal,'suggest'=>$suggest,'freeze'=>$freezze,'notified'=>$notified]);
    }

    public function getFreeze(Request $request){
        $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d')])->update(['isFrozen'=>1]);
        return response()->json(['success'=>'Freezed successfully']);
    }
    public function getUnFreeze(Request $request){
        $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d')])->update(['isFrozen'=>0]);
        return response()->json(['success'=>'Freezed successfully']);
    }

    public function postSetAll(Request $request){
        $validate= Validator::make(
            $request->all(),
            ['setall_price' =>'required|numeric',
            'user_id' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $mandi_prices = MandiDailyPrice::where(['date'=>date('Y-m-d')])->get();
        $user_id = $request->user_id;
        foreach($mandi_prices as $mandi){
            $ceiling  = MandiCeilingPriceDaily::firstOrCreate(['mandi_daily_price_id'=>$mandi->id]);
            $ceiling->ceiling_price = $request->setall_price;
            $ceiling->mandi_id = $mandi->mandi_id;
            $ceiling->created_by = $user_id;
            $ceiling->updated_by = $user_id;
            $ceiling->notified=0;
            $ceiling->save();
        }
        return response()->json(['success'=>"success"]);

    }

    public function postSetPrice(Request $request){
        // $user_id = \Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            ['setall_price' =>'required|numeric',
            'user_id' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $user_id = $request->user_id;
        $ceiling  = MandiCeilingPriceDaily::firstOrCreate(['mandi_daily_price_id'=>$request->id]);
        $ceiling->ceiling_price = $request->setall_price;
        $ceiling->updated_by = $user_id;
        $ceiling->notified =0;
        $ceiling->save();
        return response()->json(['success'=>"success"]);
    }
    public function postSetNotify(Request $request){
        // $user_id = \Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            ['id' =>'required|numeric',
            'user_id' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $user_id = $request->user_id;
        $mandi_prices = MandiDailyPrice::where('id',$request->id)->get();
        General::broadcastNotification($mandi_prices,'Notify','SAMPLE text',$user_id);
        $ceiling  = MandiCeilingPriceDaily::where(['mandi_daily_price_id'=>$request->id,'notified'=>'0'])->first();
        if(!$ceiling) return response()->json(['error'=>['Ceiling Price not set']]);
        if(!$ceiling->notified) $historys = General::ceilingHistory($mandi_prices,$user_id);
        $ceiling->notified = $ceiling->notified?$ceiling->notified+1:1;
        $ceiling->notified_time = date('Y-m-d H:i:s');
        $ceiling->updated_by = $user_id;
        $ceiling->save();
        return response()->json(['success'=>"success"]);
    }
    public function postNotifyAll(Request $request){
        
        // $user_id = \Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            [
                'user_id' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $user_id = $request->user_id;
        $err = [];

        $mandi_prices = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->get();
        foreach($mandi_prices as $_mandi){
            $_ceiling  = MandiCeilingPriceDaily::where(['mandi_daily_price_id'=>$_mandi->id,'notified'=>'0'])->first();
            if(!$_ceiling) $err[] = $_mandi->mandi->short_name;
        }
        if(count($err)) return redirect()->back()->with('error','Please set celing on '.implode(',',$err));
        General::broadcastNotification($mandi_prices,'Notify','SAMPLE text',$user_id);
        foreach($mandi_prices as $mandi){
            $ceiling  = MandiCeilingPriceDaily::firstOrCreate(['mandi_daily_price_id'=>$mandi->id]);
            if($ceiling){
                if(!$ceiling->notified) $historys = General::ceilingHistory([$mandi],$user_id);
                $ceiling->notified = $ceiling->notified?$ceiling->notified+1:1;
                $ceiling->notified_time = date('Y-m-d H:i:s');
                $ceiling->updated_by = $user_id;
                $ceiling->save();
            }
        }
        return response()->json(['success'=>"success"]);
    }

    

}