<?php
namespace App\Library;
use App\Model\Order;
use App\Model\NotificationEvent;
use App\Model\NotificationQueue;
use App\Model\MandiDailyPrice;
use App\Model\MandiCeilingPriceHistory;
use App\Model\UserMandiMapping;
use App\Model\Agmarknet;
class Dashboard{

    public static function getFacilitator($user,$from,$to){
        $user_mandi_map = UserMandiMapping::where(['user_id'=>$user->id,'active'=>'1'])->pluck('mandi_id');
        $all_count = count($user_mandi_map);
        $mandi_prices = MandiDailyPrice::whereBetween('date',[$from,$to])
                        ->whereIn('mandi_id',$user_mandi_map)
                        ->where('isSubmit','1');
                        
        $current_count = $mandi_prices->count();
        $all = [
            'qty' => round($mandi_prices->sum('save_qty'),2),
            'all_count'  => $all_count,
            'current_count' => $current_count
        ];
        return $all;
    }
    public static function getAllFacilitator($user,$from,$to){
        $user_mandi_map = UserMandiMapping::where(['active'=>'1'])->distinct('mandi_id')->pluck('mandi_id');
        $all_count = count($user_mandi_map);
        $mandi_prices = MandiDailyPrice::whereBetween('date',[$from,$to])
                        ->whereIn('mandi_id',$user_mandi_map)
                        ->where('isSubmit','1');
                        
        $current_count = $mandi_prices->count();
        $all = [
            'qty' => round($mandi_prices->sum('save_qty'),2),
            'all_count'  => $all_count,
            'current_count' => $current_count
        ];
        return $all;
    }

    public static function getOffer($user,$from,$to){
        $offers = Order::where(['orders.order_type'=>'FOR','orders.created_by'=>$user->id,'status'=>'2'])->whereBetween('orders.order_date',[$from,$to]);
        $all =[
            'qty' => round($offers->sum('order_quantity'),2)
        ];
        return $all;
    }
    public static function getPendingOffer($user,$from,$to){
        $offers = Order::where(['orders.order_type'=>'FOR','status'=>'0']);
        $all =[
            'qty' => round($offers->sum('order_quantity'),2),
            'count' => $offers->count()
        ];
        return $all;
    }
    public static function getOrder($user,$from,$to){
        $orders = Order::where(['orders.order_type'=>'Auction','orders.created_by'=>$user->id,'status'=>'2'])->whereBetween('orders.order_date',[$from,$to]);
        $all =[
            'qty' => round($orders->sum('order_quantity'),2)
        ];
        return $all;
    }
    public static function getPendingOrder($user,$from,$to){
        $orders = Order::where(['orders.order_type'=>'Auction'])->where('status','=','1');
        $all =[
            'qty' => round($orders->sum('order_quantity'),2),
            'count' => $orders->count()
        ];
        return $all;
    }
    public static function getCounter($user,$from,$to){
        $offers = Order::where(['orders.order_type'=>'FOR','orders.created_by'=>$user->id,'status'=>'2'])
                        ->whereBetween('orders.order_date',[$from,$to])
                        ->whereNotNull('counter_price');
        $all =[
            'qty' => round($offers->sum('order_quantity'),2),
            'count' => $offers->count()
        ];
        return $all;
    }

    public static function getCeiling($user,$from,$to){
        $user_mandi_map = UserMandiMapping::where(['user_id'=>$user->id,'active'=>'1'])->pluck('mandi_id');
        $all_count = count($user_mandi_map);
        $ceilings = MandiDailyPrice::whereBetween('date',[$from,$to])
                        ->whereIn('mandi_id',$user_mandi_map)
                        ->where('isSubmit','1')
                        ->whereHas('ceiling',function($c){
                            $c->whereNotNull('notified_time');
                        })
                        ->whereHas('ceilingHistory',function($q){
                                
                        })
                        ->orderBy('created_at','desc')
                        ->get();
        $notified =  [];
       
        foreach($ceilings as $ceiling){
            $notified[] = $ceiling->ceilingHistory->ceiling_price;
        }
        $similars = [];
        foreach ($notified as $value) {
            $similars[$value] = isset($similars[$value]) ? $similars[$value]+1:1;
        }
        $price = 0;
        if(!empty($similars)){
            $max =  max($similars);
            ksort($similars);
            $price= array_search($max,$similars);
        }
        $all = [
            'price' => round($price,2),
            'all_count'  => $all_count,
            'current_count' => count($ceilings)
        ];
        return $all;
    }
    public static function getAllCeiling($user,$from,$to){
        $user_mandi_map = UserMandiMapping::where(['active'=>'1'])->distinct('mandi_id')->pluck('mandi_id');
        $ceilings = MandiDailyPrice::whereBetween('date',[$from,$to])
                        ->whereIn('mandi_id',$user_mandi_map)
                        ->where('isSubmit','1')
                        ->whereHas('ceiling',function($c){
                            $c->whereNotNull('notified_time');
                        })
                        ->whereHas('ceilingHistory',function($q){
                                
                        })
                        ->orderBy('created_at','desc')
                        ->get();
        $all_count =  MandiDailyPrice::whereBetween('date',[$from,$to])
                                        ->whereIn('mandi_id',$user_mandi_map)
                                        ->where('isSubmit','1')
                                        ->count();
        $notified =  [];
        foreach($ceilings as $ceiling){
            $notified[] = $ceiling->ceilingHistory->ceiling_price;
        }
        $similars = [];
        foreach ($notified as $value) {
            $similars[$value] = isset($similars[$value]) ? $similars[$value]+1:1;
        }
        $price = 0;
        if(!empty($similars)){
            $max =  max($similars);
            ksort($similars);
            $price= array_search($max,$similars);
        }
        $all = [
            'price' => round($price,2),
            'all_count'  => $all_count,
            'current_count' => count($ceilings)
        ];
        return $all;
    }

    public static function getAvgAgmark($user,$from,$to){
        $mandis = [];
        while ($from <= $to)
        {
            $marks = Agmarknet::where('date_arrival',$from)->whereNull('is_old')->orderBy('created_at','desc')->select('modal');
            $i =1;
            $avg = 0.00;
            foreach($marks as $_marks){
                if($_marks->modal){
                    $avg = (float)$_marks->modal+ $avg;
                    $i++;
                }
            }
            if($avg > 0) $avg = $avg / $i;
            $mandis[$from] = round($avg,2);
            $mandis[$from] = $mandis[$from] ? $mandis[$from] : 0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $mandis;
    }
    public static function getAvgPurchase($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $order = Order::where('status','2')->whereDate('order_date','=',$from)->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($tot / $qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyPurchase($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where('status','2')->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($tot / $qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyQuantity($user,$from,$to){
        $qty =  0.00;
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where('status','2')->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $qty =0.00;
            foreach($order as $_order){
                $qty = $_order->order_quantity + $qty;
            }
            
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $qty;
    }

    public static function getAvgYearlyPurchase($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-01-01 00:00:00',strtotime($from));
            $order = Order::where('status','2')->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($tot / $qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgYearlyAuctionPurchase($user,$from,$to){
        $orders = 0.00;
        while ($from <= $to)
        {
            $pre_date = date('Y-01-01 00:00:00',strtotime($from));
            $order = Order::where(['status'=>'2','order_type'=>'Auction'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $_order = $i>0 ? round($tot / $qty,2):0;
            $orders = $_order + $orders;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgYearlyOfferPurchase($user,$from,$to){
        $orders = 0.00;
        while ($from <= $to)
        {
            $pre_date = date('Y-01-01 00:00:00',strtotime($from));
            $order = Order::where(['status'=>'2','order_type'=>'FOR'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $_order = $i>0 ? round($tot / $qty,2):0;
            $orders = $_order + $orders;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyAuctionPurchase($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where(['status'=>'2','order_type'=>'Auction'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($tot / $qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyOfferPurchase($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where(['status'=>'2','order_type'=>'FOR'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($tot / $qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyOfferQuantity($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where(['status'=>'2','order_type'=>'FOR'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyAuctionQuantity($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where(['status'=>'2','order_type'=>'Auction'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyAuctionForRate($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where(['status'=>'2','order_type'=>'Auction'])->whereNotNUll('order_for_price')->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_for_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($tot / $qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgWeeklyOfferForRate($user,$from,$to){
        $orders = [];
        while ($from <= $to)
        {
            $pre_date = date('Y-m-d 00:00:00', strtotime('-7 days', strtotime($from)));
            $order = Order::where(['status'=>'2','order_type'=>'FOR'])->whereNotNUll('order_for_price')->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_for_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $orders[$from] = $i>0 ? round($tot / $qty,2):0;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgYearlyActionForRate($user,$from,$to){
        $orders = 0.00;
        while ($from <= $to)
        {
            $pre_date = date('Y-01-01 00:00:00',strtotime($from));
            $order = Order::where(['status'=>'2','order_type'=>'Auction'])->whereNotNUll('order_for_price')->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_for_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $_order = $i>0 ? round($tot / $qty,2):0;
            $orders = $_order+$orders;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgYearlyOfferForRate($user,$from,$to){
        $orders = 0.00;
        while ($from <= $to)
        {
            $pre_date = date('Y-01-01 00:00:00',strtotime($from));
            $order = Order::where(['status'=>'2','order_type'=>'FOR'])->whereNotNUll('order_for_price')->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $tot = 0.00;
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $tot = ($_order->order_for_price * $_order->order_quantity) + $tot;
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $_order = $i>0 ? round($tot / $qty,2):0;
            $orders = $_order + $orders;
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return $orders;
    }
    public static function getAvgYearlyAuctionQty($user,$from,$to){
        $qty = 0.00;
        while ($from <= $to)
        {
            $pre_date = date('Y-01-01 00:00:00',strtotime($from));
            $order = Order::where(['status'=>'2','order_type'=>'Auction'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return round($qty,2);
    }
    public static function getAvgYearlyOfferQty($user,$from,$to){
        $qty = 0.00;
        while ($from <= $to)
        {
            $pre_date = date('Y-01-01 00:00:00',strtotime($from));
            $order = Order::where(['status'=>'2','order_type'=>'FOR'])->whereBetween('order_date',[$pre_date,date('Y-m-d 23:59:59',strtotime($from))])->get();
            $qty =0.00;
            $i=0;
            foreach($order as $_order){
                $qty = $_order->order_quantity + $qty;
                $i++;
            }
            $from = date('Y-m-d', strtotime($from . ' +1 day'));
        }
        return round($qty,2);
    }


}