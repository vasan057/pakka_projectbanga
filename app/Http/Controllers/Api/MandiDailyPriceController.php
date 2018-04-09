<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\MandiDailyPrice;
use App\Model\UserMandiMapping;
use App\Model\Mandi;
use App\Model\UsersBasic;
use Validator;

class MandiDailyPriceController extends Controller
{
    public function getView(Request $request,$user_id){
        $user = UsersBasic::find($user_id);
        $from = $request->input('from',date('Y-m-d'));
        $to = $request->input('to',date('Y-m-d'));
        $from = date('Y-m-d',strtotime($from));
        $to = date('Y-m-d',strtotime($to));
        $mandi_prices = MandiDailyPrice::whereBetween('date',[$from,$to])->with('mandi.location')->get();
        $mandis = Mandi::whereHas('userMap',function($q) use($user_id){
                            $q->where('usermandimapping.user_id',$user_id);
                            $q->where('usermandimapping.active',1);
                        })
                        ->with('location')
                        ->get();
        $arrivals = [];
        foreach($mandis as $mandi){
            $daily_price = MandiDailyPrice::where('mandi_id',$mandi->id)
                                    ->whereBetween('date',[$from,$to])
                                    ->with('mandi.location')->first();
            if($daily_price){
                $arrivals[] = $daily_price;
            }else{
                $arrivals[] = [
                    "mandi"=>$mandi,
                    "mandi_id"=> $mandi->id,
                    "save_min"=> 0,
                    "save_max"=> 0,
                    "save_qty"=> 0,
                    "min"=> 0,
                    "max"=> 0,
                    "isFrozen"=> 0,
                    "Status"=> "",
                    "isSubmit"=>0
                ];
            }
        }
        $states  = [];
        foreach($arrivals as $arrival){
            if(isset($arrival->mandi->location->State)){
                $states[] =$arrival->mandi->location->State;
            }
            if(isset($arrival["mandi"]->location->State)){
                $states[] =$arrival["mandi"]->location->State;
            }
        }
        $states = array_unique($states);
        $states = array_values(array_filter($states));
        return response()->json(['success'=>$arrivals,'states'=>$states]);
    }
    public function postStore(Request $request,$user_id){
       
        $validate= Validator::make(
            $request->all(),
            [   
                'mandi_id' =>'required',
                'minVal' => 'required|positive_number',
                'maxVal' => 'required|positive_number',
                'quantity' => 'required|positive_number'
            ]
        );
        $date = date('Y-m-d');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $mandi_price = MandiDailyPrice::firstOrNew(['mandi_id'=>$request->mandi_id,'date'=>$date]);
            $mandi_price->save_min =  $request->minVal; 
            $mandi_price->save_max = $request->maxVal;
            $mandi_price->save_qty = $request->quantity;
            $mandi_price->min = $request->minVal;
            $mandi_price->max =  $request->maxVal;
            $mandi_price->quantity = $request->quantity;
            if($mandi_price->isSubmit) $mandi_price->status = 'old';
            $mandi_price->isSubmit =0;
            $mandi_price->created_by = $user_id;
            $mandi_price->updated_by = $user_id;
            $mandi_price->isFrozen = $mandi_price->isFrozen ? $mandi_price->isFrozen : false;
            $mandi_price->save();
            return response()->json(['success'=>'success']);
    }
    public function postUpdate(Request $request, $user_id)
    {
        $user = UsersBasic::find($user_id);
        $user_id = $user->id;
        $validate= Validator::make(
            $request->all(),
            [
                'mandi_price_id' => 'required',
                'mandi_id' =>'required',
                'minVal' => 'required|natural_number',
                'maxVal' => 'required|natural_number',
                'quantity' => 'required|positive_number'
            ]
        );
        $date = date('Y-m-d');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $id = $request->mandi_price_id;
            $mandi_price = MandiDailyPrice::find($id);
            $mandi_price->save_min =  $request->minVal; 
            $mandi_price->save_max = $request->maxVal;
            $mandi_price->save_qty = $request->quantity;
            $mandi_price->min = $request->minVal;
            $mandi_price->max =  $request->maxVal;
            $mandi_price->quantity = $request->quantity;
            $mandi_price->updated_by = $user_id;
            if($mandi_price->isSubmit) $mandi_price->status = 'old';
            $mandi_price->isSubmit = 0;
            $mandi_price->isFrozen = $mandi_price->isFrozen ? $mandi_price->isFrozen : false;
            $mandi_price->save();
            
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    public function getUpdateSubmit($user_id){

        MandiDailyPrice::where(['date'=>date('Y-m-d'),'created_by'=>$user_id])->update(['isSubmit'=>1]);
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    public function postSubmit(Request $request,$user_id){
        $user = UsersBasic::find($user_id);
        $user_id = $user->id;
        $validate= Validator::make(
            $request->all(),
            [
                'mandi_price_id' => 'required'
            ]
            );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $id = $request->mandi_price_id;
        $m_price = MandiDailyPrice::where(['date'=>date('Y-m-d'),'id'=>$id])->first();
        if(!$m_price) return response()->json(['error'=>'This record not able to submit']);
        $m_price->isSubmit = 1;
        $m_price->save();
        return response()->json(['success'=>'Submitted successfully']);

    }

    public function getIsFreeze($id){
        $mp = MandiDailyPrice::find($id);
        if($mp && $mp->isFrozen) $status = 'Y';
        else{ $status = "N"; }
        return response()->json(['status'=>$status]);
    }
    public function getIsFreezeAll(){
        $mp = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isFrozen'=>1])->get();
        if($mp && count($mp)) $status = 'Y';
        else{ $status = "N"; }
        return response()->json(['status'=>$status]);
    }

    public function getAllView(Request $request,$user_id){
        $user = UsersBasic::find($user_id);
        $from = $request->input('from',date('Y-m-d'));
        $to = $request->input('to',date('Y-m-d'));
        if($user->roles_id == '4'){
            $mandi_prices = MandiDailyPrice::with('mandi.location')
                                ->with('user')
                                ->with('ceiling')
                                ->whereBetween('date',[$from,$to])
                                ->get();
            return response()->json(['success'=>$mandi_prices]);
        }
        return response()->json(['success'=>[]]);
    }
}
