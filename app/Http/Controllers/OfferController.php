<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Http\Requests;
use App\Model\OrderSequence;
use Auth;
use Validator;
use App\Library\General;

class OfferController extends Controller
{
    public function __construct(){
        $this->middleware(['role:facilitator|pakka'])->only(['store']);
        $this->middleware(['role:admin|pakka|facilitator|ubp'])->only(['index','show','postAccept','postReject']);
        $this->middleware(['role:admin|ubp'])->only(['update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $q = $request->input('q',NULL);
         // sorting

         $sort = $request->input('sort','id');
         $order = $request->input('order','desc');
         $order = $order == 1 ? 'desc' : 'asc';
         $sort = 'orders.'.$sort;

        $from = $request->input('from',date('Y-m-d'));
        $to = $request->input('to',date('Y-m-d'));
        if($from && $to){
            $from = date('Y-m-d 00:00:00',strtotime($from));
            $to = date('Y-m-d 23:59:59',strtotime($to));
            if(in_array($user->roles_id,[2,3])){
                $offers = Order::where(['orders.order_type'=>'FOR','orders.created_by'=>$user->id])->whereBetween('orders.order_date',[$from,$to])->search($q)->orderBy($sort,$order)->get();
            }else{
                $offers = Order::where('orders.order_type','FOR')->whereBetween('orders.order_date',[$from,$to])->search($q)->orderBy($sort,$order)->get();
            }
        }else{
            if(in_array($user->roles_id,[2,3])){
                $offers = Order::where(['orders.order_type'=>'FOR','orders.created_by'=>$user->id])->search($q)->orderBy($sort,$order)->get();
            }else{
                $offers = Order::where('orders.order_type','FOR')->search($q)->orderBy($sort,$order)->get();
            }
        }
        return view('offer.index_'.$user->role_view,['offers'=>$offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            ['mandi' =>'required',
            'pakka_arthiya' => 'required',
            'quantity' => 'required|natural_number',
            'price' => 'required|natural_number',
            'delivery_location' => 'required'
            ]
        );
        $date = date('Y-m-d H:i:s');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $order_id = $this->getOrderId('offer_sequence');
            $order = new Order;
            $order->mandi_id =  $request->mandi; 
            $order->order_type = 'FOR';
            $order->order_date = $date;
            $order->offer_number = $order_id;
            $order->destination_id = $request->delivery_location;
            $order->ref_num = $request->reference;
            $order->user_id = $request->pakka_arthiya;
            $order->order_quantity = (double) $request->quantity;
            $order->order_for_price =(double) $request->price;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id',$id)->with('destination')->with('mandi')->with('pakka_arthiya')->first();
        return response()->json(['success'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        // check if he is pakka arthia or fecilitator and owner of order
        if(in_array($user->roles_id,[2,3])){
            $check_order = Order::where(['id'=>$id,'created_by'=>$user_id])->count();
            if(!$check_order) return response()->json(['error'=>['Your not authorized user for this action']]);
        }
        $validate= Validator::make(
            $request->all(),
            [
            'mandi' =>'required_with:ubp',
            'pakka_arthiya' => 'required_with:ubp',
            'quantity' => 'required|positive_number',
            'price' => 'required_with:ubp|positive_number',
            'counter_price' => 'required|positive_number',
            'delivery_location' => 'required_with:ubp'
            ]
        );
        $date = date('Y-m-d H:i:s');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $order = Order::find($id);
            if(!$order->forFreight) return response()->json(['error'=>["Setup FOR master data for selected mandi"]]);
            if($order->order_for_price < $request->counter_price) return response()->json(['error'=>["Counter price should always lessthan offer price"]]);
            if($order->order_quantity < $request->quantity) return response()->json(['error'=>["quantity should always lessthan privous quantity"]]);
            if($order->forFreight && !$order->forFreight->forlinelist) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);
            $request->mandi ? $order->mandi_id =  $request->mandi:''; 
            $order->order_type = 'FOR';
            $request->delivery_location ? $order->destination_id = $request->delivery_location:'';
            $request->reference ? $order->ref_num = $request->reference:'';
            $request->pakka_arthiya ? $order->user_id = $request->pakka_arthiya:'';
            $order->order_quantity = (double) $request->quantity;
            $request->price ? $order->order_for_price = (double) $request->price:'';
            $order->counter_price =(double) $request->counter_price;
            $order->updated_by = $user_id;
            $order->save();
             // Get base price by calling General library
             $base_price = General::getReversePrice($order);
             $order->order_price = $base_price;
             $order->save();
            
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getOrderId($field){
        $next = 'next_'.$field;
        General::checkSequence();
        $sequence = OrderSequence::first();
        $old_order = $sequence->$field;
        $new_order  = $sequence->$next;
        $sequence->$field = $new_order;
        $sequence->$next = $new_order+1;
        $sequence->save();
        return $new_order;
    }
    public function postAccept(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $validate= Validator::make($request->all(),[
            'orders' =>'required|array'
            ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        if(in_array($user->roles_id,[2,3])){
            $check_order = Order::where('created_by',$user_id)->whereIn('id',$orders)->count();
            if(!$check_order) return response()->json(['error'=>['Your not authorized user for this action']]);
        }
        foreach($orders as $order){
            $update =Order::where('id',$order)->where(['order_number'=>NULL,'status'=>'0'])->first();
            if($update){
                if(!$update->forFreight) return response()->json(['error'=>["Setup FOR master data for selected mandi"]]);
                if($update->forFreight && !$update->forFreight->forlinelist) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);
                $order_id = $this->getOrderId('offerorder_sequence');
                $update->status =2;
                $update->order_number = $order_id;
                $update->updated_by = $user->id;
                $update->save();
                $base_price = General::getReversePrice($update);
                $update->order_price = $base_price;
                $update->save();
            }
        }
        return response()->json(['success'=>'success']);
    }

    public function postReject(Request $request){
        $validate= Validator::make($request->all(),[
            'orders' =>'required|array'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders_id =  $request->orders;
        $orders = Order::whereIn('id',$orders_id)->get();
        foreach($orders as $order){
            if(!$order->forFreight) return response()->json(['error'=>["Setup FOR master data for selected mandi"]]);
            if($order->forFreight && !$order->forFreight->forlinelist) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);
            $order->status = 3;
            $order->save();
            $base_price = General::getReversePrice($order);
            $order->order_price = $base_price;
            $order->save();
        }
        return response()->json(['success'=>'success']);
    }
}
