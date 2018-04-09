<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\UsersBasic;
use App\Model\Mandi;
use App\Http\Requests;
use App\Model\OrderSequence;
use Validator;
use App\Library\General;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OfferController as OfferLib;

class OfferController extends Controller
{
    public function getView(Request $request,$user_id){
        $user = UsersBasic::find($user_id);
        $from = $request->input('from',NULL);
        $to = $request->input('to',NULL);
        if($from && $to){
            $from = date('Y-m-d 00:00:00',strtotime($from));
            $to = date('Y-m-d 23:59:59',strtotime($to));
            if(in_array($user->roles_id,[2,3])){
                $offers = Order::where(['order_type'=>'FOR','created_by'=>$user->id])->whereBetween('order_date',[$from,$to]);
            }else{
                $offers = Order::where('order_type','FOR')->whereBetween('order_date',[$from,$to]);
            }
        }else{
            if(in_array($user->roles_id,[2,3])){
                $offers = Order::where(['order_type'=>'FOR','created_by'=>$user->id]);
            }else{
                $offers = Order::where('order_type','FOR');
            }
        }
        $offers = $offers->with('mandi')->with('user')->with('destination')->with('pakka_arthiya')->get();
        $mandis  = Mandi::whereHas('userMap',function($q) use($user_id,$user){
            if(in_array($user->roles_id,[2,3])){
            $q->where('users_basic.id',$user_id);
            }
        })
        ->get(['id','short_name']);
        $arthiya = [];
        foreach($mandis as $mandi){
            if($mandi && count($mandi->userMap)){

                $users = $mandi->userMap()->where(['users_basic.roles_id'=>2])->get();
                foreach($users as $user){
                    $arthiya[] = [
                        "id"=>$user->id,
                        'user_id'=>$user->user_id
                    ];
                }
            } 
        }

        return response()->json(['success'=>$offers,'mandis'=>$mandis,'arthiya'=>$arthiya]);
    }

    public function postStore(Request $request, $user_id){
        $validate= Validator::make(
            $request->all(),
            [
            'mandi_id' =>'required',
            'arthiya_user_id' => 'required',
            'offer_quantity' => 'required|numeric',
            'offer_for_price' => 'required|numeric',
            'delivery_loc' => 'required'
            ]
        );
        $date = date('Y-m-d H:i:s');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $offer_lib = new OfferLib;
        $order_id = $offer_lib->getOrderId('offer_sequence');
        $order = new Order;
        $order->mandi_id =  $request->mandi_id; 
        $order->order_type = 'FOR';
        $order->order_date = $date;
        $order->offer_number = $order_id;
        $order->destination_id = $request->delivery_loc;
        $order->ref_num = $request->input('ref_num','-');
        $order->user_id = $request->arthiya_user_id;
        $order->order_quantity = (double) $request->offer_quantity;
        $order->order_for_price =(double) $request->offer_for_price;
        $order->created_by = $user_id;
        $order->updated_by = $user_id;
        $order->status = 0;
        $order->save();

       // Get base price by calling General library
       $base_price = General::getReversePrice($order);
       $order->order_price = $base_price;
       $order->save();
       
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    public function postUpdate(Request $request,$user_id){
        $user = UsersBasic::find($user_id);
        // check if he is pakka arthia or fecilitator and owner of order
        $validate= Validator::make(
            $request->all(),
            [
                'offer_id' => 'required',
                'mandi_id' =>'required',
                'arthiya_user_id' => 'required',
                'offer_quantity' => 'required|numeric',
                'offer_for_price' => 'required|numeric',
                'delivery_loc' => 'required',
                'counter_price' => 'required|numeric'
                ]
            );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $id = $request->offer_id;
        if(in_array($user->roles_id,[2,3])){
            $check_order = Order::where(['id'=>$id,'created_by'=>$user_id])->count();
            if(!$check_order) return response()->json(['error'=>['Your not authorized user for this action']]);
        }
        $date = date('Y-m-d H:i:s');
            $order = Order::find($id);
            if(!$order->forFreight) return response()->json(['error'=>["Setup FOR master data for selected mandi"]]);
            if($order->order_for_price < $request->counter_price) return response()->json(['error'=>["Counter price should always lessthan offer price"]]);
            if($order->forFreight && !$order->forFreight->forlinelist) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);
            $order->mandi_id =  $request->mandi_id; 
            $order->order_type = 'FOR';
            $order->destination_id = $request->delivery_loc;
            $order->ref_num = $request->ref_num;
            $order->counter_price =(double) $request->counter_price;
            $order->user_id = $request->arthiya_user_id;
            $order->order_quantity = (double) $request->offer_quantity;
            $order->order_for_price =(double) $request->offer_for_price;
            $order->updated_by = $user_id;
            $order->save();
             // Get base price by calling General library
             $base_price = General::getReversePrice($order);
             $order->order_price = $base_price;
             $order->save();
            
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    public function postAccept(Request $request,$user_id){
        $user = UsersBasic::find($user_id);
        $validate= Validator::make($request->all(),[
            'orders' =>'required'
            ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        $orders = explode(',',$orders);
        if(in_array($user->roles_id,[2,3])){
            $check_order = Order::where('created_by',$user_id)->whereIn('id',$orders)->count();
            if(!$check_order) return response()->json(['error'=>['Your not authorized user for this action']]);
        }
        foreach($orders as $order){
            $update =Order::where('id',$order)->where(['order_number'=>NULL,'status'=>'0'])->first();
            if($update){
                if(!$update->forFreight) return response()->json(['error'=>["Setup FOR master data for selected mandi"]]);
                if($update->forFreight && !$update->forFreight->forlinelist) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);
                $offer_lib = new OfferLib;
                $order_id = $offer_lib->getOrderId('offerorder_sequence');
                $update->status =2;
                $update->order_number = $order_id;
                $update->updated_by = $user->id;
                $update->save();
            }
        }
        return response()->json(['success'=>'success']);
    }

    public function postReject(Request $request,$user_id){
        $validate= Validator::make($request->all(),[
            'orders' =>'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $order_id =  $request->orders;
        $order_id = explode(',',$order_id);
       $orders =  Order::whereIn('id',$order_id)->get();
       foreach($orders as $order){
            if(!$order->forFreight) return response()->json(['error'=>["Setup FOR master data for selected mandi"]]);
            if($order->forFreight && !$order->forFreight->forlinelist) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);
            $order->status = 3;
            $order->save();
        }
        return response()->json(['success'=>'success']);
    }
}
