<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController as OrderLib;
use App\Model\Order;
use App\Model\Mandi;
use App\Library\General;
use App\Model\UsersBasic;
use App\Model\OrderSequence;

use Validator;

class OrderController extends Controller
{

    public function getView(Request $request,$user_id){
        $user = UsersBasic::find($user_id);
        $from = $request->input('from',NULL);
        $to = $request->input('to',NULL);
        $status = $request->input('status',false)?$request->input('status'):'0';
        if($status == 0 && $user->roles_id == 4) $status = 1;

        if($from && $to){
            $from = date('Y-m-d 00:00:00',strtotime($from));
            $to = date('Y-m-d 23:59:59',strtotime($to));
            if(in_array($user->roles_id,[2,3])){
                $orders = Order::whereNotNull('order_number')->with('destination')->where(['created_by'=>$user->id])->whereBetween('order_date',[$from,$to]);
            }else{
                $orders = Order::whereNotNull('order_number')->with('destination')->whereBetween('order_date',[$from,$to]);
            }
        }else{
            if(in_array($user->roles_id,[2,3])){
                $orders = Order::whereNotNull('order_number')->with('destination')->where(['created_by'=>$user->id]);
            }else{
                $orders = Order::whereNotNull('order_number')->with('destination');
            }
        }
        // return $orders;
        $orders = $orders->with('mandi')->with('user')->with('pakka_arthiya')->get();
        $mandis  = Mandi::whereHas('userMap',function($q) use($user_id,$user){
            if(in_array($user->roles_id,[2,3])){
                $q->where('users_basic.id',$user_id);
              
            }
        })
        ->get(['id','short_name']);
        $arthiya = [];
        foreach($mandis as $mandi){
            if($mandi && count($mandi->userMap)){

                $users = $mandi->userMap()->where(['users_basic.roles_id'=>2,'usermandimapping.active'=>'1'])->get();
                foreach($users as $user){
                    $arthiya[] = [
                        "id"=>$user->id,
                        'user_id'=>$user->user_id
                    ];
                }
            } 
        }
        return response()->json(['success'=>$orders,'mandis'=>$mandis,'arthiya'=>$arthiya]);
    }
    public function postStore(Request $request,$user_id){
        $validate= Validator::make(
            $request->all(),
            [
            'mandi_id' =>'required',
            'arthiya_user_id' => 'required',
            'order_quantity' => 'required|numeric',
            'order_base_rate' => 'required|numeric',
            'delivery_loc' => 'required'
            ]
        );
        $date = date('Y-m-d H:i:s');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        // generate order id of code 1
        // creating order from Ordercontroller
        $order_lib = new OrderLib;
        $order_id = $order_lib->getOrderId('order_sequence');
        $order = new Order;
        $order->mandi_id =  $request->mandi_id; 
        $order->order_type = 'Auction';
        $order->order_date = $date;
        $order->order_number = $order_id;
        $order->destination_id = $request->delivery_loc;
        $order->user_id = $request->arthiya_user_id;
        $order->order_quantity = (double)$request->order_quantity;
        $order->order_price = (double)$request->order_base_rate;
        $order->ref_num = $request->ref_num;
        $order->created_by = $user_id;
        $order->updated_by = $user_id;
        $order->status = 0;
        $order->save();
        // Inserting for rate

        $prices = General::GetForPrice($order);
        if($prices){
            $order->order_other_rate = isset($prices['order_other_rate'])?$prices['order_other_rate']:0;
            $order->order_for_price = isset($prices['order_for_rate'])?$prices['order_for_rate']:0;
            $order->order_total_price = isset($prices['order_total_value'])?$prices['order_total_value']:0;
            $order->save();
        }
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    public function postUpdate(Request $request,$user_id,$id){
        $user = UsersBasic::find($user_id);
        // check if he is pakka arthia or fecilitator and owner of order
        if(in_array($user->roles_id,[2,3])){
            $check_order = Order::where(['id'=>$id,'created_by'=>$user_id])->count();
            if(!$check_order) return response()->json(['error'=>['Your not authorized user for this action']]);
        }
        $validate= Validator::make(
            $request->all(),
            ['mandi_id' =>'required',
            'arthiya_user_id' => 'required',
            'order_quantity' => 'required|numeric',
            'order_base_rate' => 'required|numeric',
            'delivery_loc' => 'required'
            ]
        );
        $date = date('Y-m-d H:i:s');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $order = Order::find($id);
        $order->mandi_id =  $request->mandi_id; 
        $order->order_type = 'Auction';
        $order->order_date = $date;
        $order->destination_id = $request->delivery_loc;
        $order->user_id = $request->arthiya_user_id;
        $order->order_quantity = (double)$request->order_quantity;
        $order->order_price = (double)$request->order_base_rate;
        $order->ref_num = $request->ref_num;
        $order->updated_by = $user_id;
        $order->status = 0;
        $order->save();
		 // for rate fixing
         $prices = General::GetForPrice($order);
         if($prices){
             $order->order_other_rate = isset($prices['order_other_rate'])?$prices['order_other_rate']:0;
             $order->order_for_price = isset($prices['order_for_rate'])?$prices['order_for_rate']:0;
             $order->order_total_price = isset($prices['order_total_value'])?$prices['order_total_value']:0;
             $order->save();
         }
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }
    public function postSubmit(Request $request,$user_id){
        $validate= Validator::make($request->all(),[
            'orders' =>'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        $orders = explode(',',$orders);
        Order::whereIn('id',$orders)->update(['status'=>1]);
        return response()->json(['success'=>'success']);
    }

    public function postAccept(Request $request,$user_id){
        $validate= Validator::make($request->all(),[
            'orders' =>'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        $orders = explode(',',$orders);
        $is_forfrieght = false;
        $order = Order::whereIn('id',$orders)->get();
        foreach($order as $_order){
            if($_order->forFreight && !$_order->forFreight->forlinelist) $is_forfrieght = true;
        }
        if($is_forfrieght) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);

        Order::whereIn('id',$orders)->update(['status'=>2]);
        return response()->json(['success'=>'success']);
    }

    public function postReject(Request $request,$user_id){
        $validate= Validator::make($request->all(),[
            'orders' =>'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        $orders = explode(',',$orders);
        $is_forfrieght = false;
        $order = Order::whereIn('id',$orders)->get();
        foreach($order as $_order){
            if($_order->forFreight && !$_order->forFreight->forlinelist) $is_forfrieght = true;
        }
        if($is_forfrieght) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);

        Order::whereIn('id',$orders)->update(['status'=>3]);
        return response()->json(['success'=>'success']);
    }

    public function postForRate(Request $request){
        $validate= Validator::make($request->all(),[
            'order_id' =>'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $order = Order::find($request->order_id);
        $prices = General::GetForPrice($order);
        if($prices){
            $order->order_other_rate = isset($prices['order_other_rate'])?$prices['order_other_rate']:0;
            $order->order_for_price = isset($prices['order_for_rate'])?$prices['order_for_rate']:0;
            $order->order_total_price = isset($prices['order_total_value'])?$prices['order_total_value']:0;
            $order->save();
        }
        return response()->json(['success'=>$order]);
    }
    public function postForRateReverse(Request $request){
        $validate= Validator::make($request->all(),[
            'order_id' =>'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $order = Order::find($request->order_id);
        $prices = General::getReversePrice($order);
        
        return response()->json(['success'=>$prices]);
    }
}
