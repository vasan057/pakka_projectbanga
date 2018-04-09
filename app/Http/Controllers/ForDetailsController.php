<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\createorder;
use App\Model\ForFreight;
use App\Model\ForLineItem;
use App\Model\Order;
use App\Model\ForDetail;

class ForDetailsController extends Controller
{
    public function index(){
        //$forfreights = ForFreight::get();
       
        
        return view('for_details');
    }
    public function getForPrice($order_number){
        $order = Order::where('order_number',$order_number)->first();
        // print_r($order->forFreight->toArray());
        $price = $this->getForRate($order);
        print_r($price);
    }

    public function getMandi(Request $request){
        $order = $request->order_id;
        $detail = Order::where('order_number',$order)->first();
        return response()->json(['data'=>$detail]);
        
    }
    public function getGID(Request $request){
        $mandi_id = $request->mandi_id;
        $destination_id = $request->destination_id;
        $date = date('Y-m-d 00:00:00');
        $dethail = ForFreight::where('mandi_id',$mandi_id)->where('destination_id',$destination_id)->where('valid_from','<',$date)->orderBy('valid_from', 'dsc')->first();
       
       //return $dethail;
        return response()->json(['data'=>$dethail]);
        //return $mandi_id.'##'.$location_id;
    }
    public function getParameter(Request $request){
        $total=0;$percentage=0;
        $gid = $request->gid;
        $quantity = $request->order_quantity;
        $base_rate = ($request->base_rate)/10;
        $base_price = $request->base_price;
        $valid_from = $request->valid_from;
        $para = ForLineItem::where('group',$gid)->where('valid_from','<=',$valid_from)->where('valid_to','>',$valid_from)->get();
        //handling for blank $para
        foreach($para as $qw){
            $d[] = array('sequence' => "$qw->sequence" ,'type' => "$qw->data_type" ,'value' => "$qw->value" ,'parameter' => "$qw->parameter",'base' => "$qw->base");
        }
      /*   $myJSON = json_encode($d);
       $myJSON = json_decode($myJSON); */
       // print_r($d);
$tot=array();$k=0;$overall_tot=0;
        foreach($para as $qw){
            $group = $qw->group;
            $value = $qw->value;
            $data_type = $qw->data_type;
            $sequence = $qw->sequence;
            $base = $qw->base;

             if($data_type=='flat')
            {
                if($base=='')
                {
                    
                    ${'data'.$sequence}=$value; 
                }
               
            }
            else if($data_type=='perc')
            {
                if($base=='')
                {
                    print_r("base rate is".$base_price);
                    ${'data'.$sequence} = ($base_rate * $value)/100;
                }else{
                    
                   // print_r("baseis".$base);
                    ${'data'.$sequence} = (${'data'.$base}*$value)/100;
                //print_r("well".$base);
                }

            }
            else if($data_type=='total')
            {
                $total_for=$base_price;
                $baseValue = explode('+',$base);
                
                $tot[$k]=0;
                foreach($baseValue as $bs)
                {
                    if($bs==0)
                    {
                        $tot[$k]=$tot[$k]+$base_rate;
                    }
                    if(isset(${'data'.$bs}))
                    $tot[$k]=$tot[$k]+${'data'.$bs};
                    print_r("inthe loop".$tot[$k]);
                }
                $k++;
                
               /*  for($i=1;$i<=sizeof($baseValue);$i++){
                     if(isset(${'data'.$i})){

                         $total_for = $total_for + ${'data'.$i};

                     }

                } */

                ${'data'.$sequence} =$tot[$k-1] ;
                //print_r($total_for);
                
                print_r($tot);
                
                //$total_for=$base_price;
               
            }
            print_r("</n>value for".$sequence." is".${'data'.$sequence});
        }
        $overall_tot=$tot[$k-1];
      print_r('overall tot='.$overall_tot); 
    }

    public function getForRate($order){
        $total=0;$percentage=0;
        $gid = $order->forFreight->gid;
        $quantity = $order->order_quantity;
        $base_rate = ($order->order_price)/$quantity;
        $base_price = $order->order_price;
        $valid_from = $order->forFreight->valid_from;
        echo $gid;
        $para = ForLineItem::where('group',$gid)->get();
        //handling for blank $para
        // print_r($para);
        foreach($para as $qw){
            $d[] = array('sequence' => "$qw->sequence" ,'type' => "$qw->data_type" ,'value' => "$qw->value" ,'parameter' => "$qw->parameter",'base' => "$qw->base");
        }
      /*   $myJSON = json_encode($d);
       $myJSON = json_decode($myJSON); */
       // print_r($d);
$tot=array();$k=0;$overall_tot=0;
        foreach($para as $qw){
            $group = $qw->group;
            $value = $qw->value;
            $data_type = $qw->data_type;
            $sequence = $qw->sequence;
            $base = $qw->base;

             if($data_type=='flat')
            {
                if($base=='')
                {
                    
                    ${'data'.$sequence}=$value; 
                }
               
            }
            else if($data_type=='perc')
            {
                if($base=='')
                {
                    // print_r("base rate is".$base_price);
                    ${'data'.$sequence} = ($base_rate * $value)/100;
                }else{
                    
                   // print_r("baseis".$base);
                    ${'data'.$sequence} = (${'data'.$base}*$value)/100;
                //print_r("well".$base);
                }

            }
            else if($data_type=='total')
            {
                $total_for=$base_price;
                $baseValue = explode('+',$base);
                
                $tot[$k]=0;
                foreach($baseValue as $bs)
                {
                    if($bs==0)
                    {
                        $tot[$k]=$tot[$k]+$base_rate;
                    }
                    if(isset(${'data'.$bs}))
                    $tot[$k]=$tot[$k]+${'data'.$bs};
                    // print_r("inthe loop".$tot[$k]);
                }
                $k++;
                
               /*  for($i=1;$i<=sizeof($baseValue);$i++){
                     if(isset(${'data'.$i})){

                         $total_for = $total_for + ${'data'.$i};

                     }

                } */

                ${'data'.$sequence} =$tot[$k-1] ;
                //print_r($total_for);
                
                print_r($tot);
                
                //$total_for=$base_price;
               
            }
            print_r("</n>value for".$sequence." is".${'data'.$sequence});
        }
        $overall_tot=$tot[$k];
      return 'overall tot='.$overall_tot; 
    }
}
