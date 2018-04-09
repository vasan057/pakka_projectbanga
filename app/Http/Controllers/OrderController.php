<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\OrderSequence;
use App\Http\Requests;
use Validator;
use App\Library\General;
use Auth;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware(['role:admin|facilitator|ubp|pakka'])->only(['postSubmit','postAccept','store','show','update']);
        $this->middleware(['role:admin|pakka|facilitator|ubp'])->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // sorting

        $sort = $request->input('sort','id');
        $order = $request->input('order','desc');
        $order = $order == 1 ? 'desc' : 'asc';
        $sort = 'orders.'.$sort;

        $q = $request->input('q',NULL);
        $from = $request->input('from',NULL);
        $to = $request->input('to',NULL);
        $status = $request->input('status',false)?$request->input('status'):'0';
        if($status == 0 && $user->roles_id == 4) $status = 1;
        if($status == 2 && !$from){
            $from = date('Y-m-d 00:00:00',strtotime("-1 days"));
        }elseif($status != 2 && !$from){
            $from = date('Y-m-d 00:00:00',strtotime("-30 days"));
        } 
        if(!$to) $to = date('Y-m-d 00:00:00');
        if($from && $to){
            $from = date('Y-m-d 23:59:59',strtotime($from));
            $to = date('Y-m-d 23:59:59',strtotime($to));
            if(in_array($user->roles_id,[2,3])){
                $orders = Order::whereNotNull('orders.order_number')->where(['orders.status'=>$status,'orders.created_by'=>$user->id])->whereBetween('orders.order_date',[$from,$to])->search($q)->orderBy($sort,$order)->get();
            }else{
                $orders = Order::whereNotNull('orders.order_number')->where('orders.status',$status)->whereBetween('orders.order_date',[$from,$to])->search($q)->orderBy($sort,$order)->get();
            }
        }else{
            if(in_array($user->roles_id,[2,3])){
                $orders = Order::whereNotNull('orders.order_number')->where(['orders.status'=>$status,'orders.created_by'=>$user->id])->search($q)->orderBy($sort,$order)->get();
            }else{
                $orders = Order::whereNotNull('orders.order_number')->where('orders.status',$status)->search($q)->orderBy($sort,$order)->get();
            }
        }
        // return $orders;
        return view('order.index'.'_'.$user->role_view,['orders'=>$orders,'status'=>$status,'from'=>date('Y-m-d',strtotime($from)),'to'=>date('Y-m-d',strtotime($to))]);
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
        // generate order id of code 1
            $order_id = $this->getOrderId('order_sequence');
            $order = new Order;
            $order->mandi_id =  $request->mandi; 
            $order->order_type = 'Auction';
            $order->order_date = $date;
            $order->order_number = $order_id;
            $order->destination_id = $request->delivery_location;
            $order->ref_num = $request->reference;
            $order->user_id = $request->pakka_arthiya;
            $order->order_quantity = (double) $request->quantity;
            $order->order_price =(double) $request->price;
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
            ['mandi' =>'required',
            'pakka_arthiya' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'delivery_location' => 'required'
            ]
        );
        $date = date('Y-m-d H:i:s');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $order = Order::find($id);
            $order->mandi_id =  $request->mandi; 
            $order->order_type = 'Auction';
            $order->destination_id = $request->delivery_location;
            $order->ref_num = $request->reference;
            $order->user_id = $request->pakka_arthiya;
            $order->order_quantity = (double) $request->quantity;
            $order->order_price =(double) $request->price;
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

    public function postSubmit(Request $request){
        $validate= Validator::make($request->all(),[
            'orders' =>'required|array'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        Order::whereIn('id',$orders)->update(['status'=>1]);
        return response()->json(['success'=>'success']);
    }

    public function postAccept(Request $request){
        $validate= Validator::make($request->all(),[
            'orders' =>'required|array'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        $order = Order::whereIn('id',$orders)->get();
        $is_forfrieght = false;
        foreach($order as $_order){
            if($_order->forFreight && !$_order->forFreight->forlinelist) $is_forfrieght = true;
        }
        if($is_forfrieght) return response()->json(['error'=>["Setup FOR line master data for selected mandi"]]);
        Order::whereIn('id',$orders)->update(['status'=>2]);
        return response()->json(['success'=>'success']);
    }
    public function postReject(Request $request){
        $validate= Validator::make($request->all(),[
            'orders' =>'required|array'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $orders =  $request->orders;
        $order = Order::whereIn('id',$orders)->get();
        $is_forfrieght = false;
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
