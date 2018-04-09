<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MandiDailyPrice;
use App\Http\Requests;
use App\Model\MandiCeilingPriceDaily;
use App\Model\NotificationEvent;
use App\Model\NotificationQueue;
use App\Library\General;
use App\Model\UserMandiMapping;
use App\Model\MandiCeilingPriceHistory;
use Validator;
use Auth;
use Excel;
class CeilingController extends Controller
{
    public $user_id;
    public function __construct(){
        $this->middleware(['role:admin|pakka|facilitator|ubp'])->only(['getView']);
        $this->middleware(['role:admin|ubp'])->only(
            ['getFreeze','getUnFreeze','postSetAll','postSetPrice','postSetNotify','getNotifyAll']
        );
        $this->user_id = Auth::user()->id;
    }
    
    public function getView(Request $rquest){
       $user = Auth::user();
       $notified = 'no';
       if($user->roles_id != '4'){
           $mandis = [];
            $user_mandi_map = UserMandiMapping::where(['user_id'=>$user->id,'active'=>'1'])->get();
            foreach($user_mandi_map as $mandi_map){
                $mandis[] = $mandi_map->mandi_id;
                // $daily_price = MandiDailyPrice::firstOrCreate(['mandi_id'=>$mandi_map->mandi_id,'date'=>date('Y-m-d')]);
            }

            $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])
                                    ->whereIn('mandi_id',$mandis)
                                    ->whereHas('ceilingHistory',function($q){

                                    })
                                    ->whereBetween('created_at',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')])->orderBy('created_at','desc')->get();
        }else{
            $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->get();
       }
       $ceilings_count = count($ceilings);
       $notify_count = 0;
       foreach($ceilings as $ceiling){
           if(isset($ceiling->ceiling->notified_time) && $ceiling->ceiling->notified_time) ++$notify_count;
       }
       if($notify_count > 0 ) $notified = 'yes';
        $min_price = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->min('min');
        return view('ceiling.view_'.$user->role_view,['ceilings'=>$ceilings,'min'=>$min_price,'notified'=>$notified]);
    }

    public function getFreeze(Request $request){
        $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d')])->update(['isFrozen'=>1]);
        return redirect()->back()->with('success','Freezed successfully');
    }
    public function getUnFreeze(Request $request){
        $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d')])->update(['isFrozen'=>0]);
        return redirect()->back()->with('success','UnFreezed successfully');
    }

    public function postAlert(Request $request)
    {
        return NotificationQueue::where('user_id',$this->user_id)->update(['read'=>1]);
    }

    public function postSetAll(Request $request){
        $user_id = \Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            ['setall_price' =>'required|numeric',
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $mandi_prices = MandiDailyPrice::where(['date'=>date('Y-m-d')])->get();
        foreach($mandi_prices as $mandi){
            $ceiling  = MandiCeilingPriceDaily::firstOrCreate(['mandi_daily_price_id'=>$mandi->id]);
            $ceiling->ceiling_price = $request->setall_price;
            $ceiling->mandi_id = $mandi->mandi_id;
            $ceiling->created_by = $user_id;
            $ceiling->updated_by = $user_id;
            $ceiling->notified = 0;
            $ceiling->save();
        }
        $request->session()->flash("success","Successfully set the price.");
        return response()->json(['success'=>"success"]);

    }

    public function postSetPrice(Request $request){
        $user_id = \Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            ['setall_price' =>'required|numeric',
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $ceiling  = MandiCeilingPriceDaily::firstOrCreate(['mandi_daily_price_id'=>$request->id]);
        $ceiling->ceiling_price = $request->setall_price;
        $ceiling->notified = 0;
        $ceiling->updated_by = $user_id;
        $ceiling->save();
        $request->session()->flash("success","Successfully set the price.");
        return response()->json(['success'=>"success"]);
    }
    public function postSetNotify(Request $request){
        $user_id = \Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            [
                'id' =>'required|numeric',
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $ceiling  = MandiCeilingPriceDaily::where(['mandi_daily_price_id'=>$request->id,'notified'=>'0'])->first();
        $mandi_prices = MandiDailyPrice::where('id',$request->id)->get();
        if(!$ceiling) return response()->json(['error'=>['Ceiling Price not set']]);
        // as per vipul discussion
        // combination of notified=1 and ceiling price available the inserting in history
        if(!$ceiling->notified) $historys = General::ceilingHistory($mandi_prices,$user_id);
        General::broadcastNotification($mandi_prices,'Notify','SAMPLE text',$user_id);
        $ceiling->notified = $ceiling->notified?$ceiling->notified+1:1;
        $ceiling->notified_time = date('Y-m-d H:i:s');
        $ceiling->updated_by = $user_id;
        $ceiling->save();
        $request->session()->flash('success',"Successfullly notified.");
        return response()->json(['success'=>"success"]);
    }
    public function getNotifyAll(Request $request){
        $user_id = \Auth::user()->id;
        $mandi_prices = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->get();
        $err = [];

        foreach($mandi_prices as $_mandi){
            $_ceiling  = MandiCeilingPriceDaily::where(['mandi_daily_price_id'=>$_mandi->id,'notified'=>'0'])->first();
            if(!$_ceiling) $err[] = $_mandi->mandi->short_name;
        }
        if(count($err)) return redirect()->back()->with('error','Please set celing on '.implode(',',$err));
        General::broadcastNotification($mandi_prices,'Notify','SAMPLE text',$user_id);
        foreach($mandi_prices as $mandi){
            $ceiling  = MandiCeilingPriceDaily::where(['mandi_daily_price_id'=>$mandi->id])->first();
            if(!$ceiling->notified) $historys = General::ceilingHistory([$mandi],$user_id);
            if($ceiling){
                $ceiling->notified = $ceiling->notified?$ceiling->notified+1:1;
                $ceiling->notified_time = date('Y-m-d H:i:s');
                $ceiling->updated_by = $user_id;
                $ceiling->save();
            }else{
                $err = true;
                continue;
            }
        } 
        return redirect()->back()->with('success','Notified successfully');
    }

    public function getExport(Request $request){
       $user = Auth::user();
       if($user->roles_id != '4'){
           $mandis = [];
            $user_mandi_map = UserMandiMapping::where('user_id',$user->id)->get();
            foreach($user_mandi_map as $mandi_map){
                $mandis[] = $mandi_map->mandi_id;
                // $daily_price = MandiDailyPrice::firstOrCreate(['mandi_id'=>$mandi_map->mandi_id,'date'=>date('Y-m-d')]);
            }

            $ceilings = MandiDailyPrice::whereIn('mandi_id',$mandis)->where(['date'=>date('Y-m-d'),'isSubmit'=>1])->get();
            }else{
                $ceilings = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->get();
        }
        $min_price = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->min('min');
       
    }

    

}
