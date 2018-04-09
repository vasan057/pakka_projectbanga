<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\MandiDailyPrice;
use App\Model\UserMandiMapping;
use App\Model\Order;
use App\Library\Dashboard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $from = date('Y-m-d 00:00:00',strtotime("-1 days"));
        $today = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $current_date = date('Y-m-d');
        $data = [];
        if(in_array($user->roles_id,[2,3])){
            $arrival = Dashboard::getFacilitator($user,$today,$to);
            $offer = Dashboard::getOffer($user,$from,$to);
            $order = Dashboard::getOrder($user,$from,$to);
            $ceiling = Dashboard::getCeiling($user,$today,$to);
            $counter = Dashboard::getCounter($user,$from,$to);
            $data  = [];
            $data['arrival'] =  $arrival;
            $data['offer'] = $offer;
            $data['order'] = $order;
            $data['counter'] = $counter;
            $data['ceiling'] = $ceiling;
        }elseif(in_array($user->roles_id,[1,4])){
            $arrival = Dashboard::getAllFacilitator($user,$today,$to);
            $offer = Dashboard::getPendingOffer($user,$from,$to);
            $order = Dashboard::getPendingOrder($user,$from,$to);
            $ceiling = Dashboard::getAllCeiling($user,$today,$to);
            $avg_agmark = Dashboard::getAvgAgmark($user,'2018-03-10','2018-04-06');
            $avg_purchase = Dashboard::getAvgPurchase($user,'2018-03-10','2018-04-06');
            $avg_weekly_purchase = Dashboard::getAvgWeeklyPurchase($user,'2018-03-10','2018-04-06');
            $avg_yearly_purchase = Dashboard::getAvgYearlyPurchase($user,'2018-03-10','2018-04-06');
            $avg_weekly_offer_purchase = Dashboard::getAvgWeeklyOfferPurchase($user,$current_date,$current_date);
            $avg_weekly_offer_quantity = Dashboard::getAvgWeeklyOfferQuantity($user,$current_date,$current_date);
            $avg_weekly_auction_quantity = Dashboard::getAvgWeeklyAuctionQuantity($user,$current_date,$current_date);
            $avg_weekly_auction_for_rate = Dashboard::getAvgWeeklyAuctionForRate($user,$current_date,$current_date);
            $avg_weekly_offer_for_rate = Dashboard::getAvgWeeklyOfferForRate($user,$current_date,$current_date);
            $avg_yearly_auction_for = Dashboard::getAvgYearlyActionForRate($user,$current_date,$current_date);
            $avg_yearly_offer_for = Dashboard::getAvgYearlyOfferForRate($user,$current_date,$current_date);
            $avg_auction_purchase = Dashboard::getAvgWeeklyAuctionPurchase($user,$current_date,$current_date);
            $avg_yearly_auction_purchase = Dashboard::getAvgYearlyAuctionPurchase($user,$current_date,$current_date);
            $avg_yearly_offer_purchase = Dashboard::getAvgYearlyOfferPurchase($user,$current_date,$current_date);
            $avg_yearly_auction_qty = Dashboard::getAvgYearlyAuctionQty($user,$current_date,$current_date);
            $avg_yearly_offer_qty = Dashboard::getAvgYearlyOfferQty($user,$current_date,$current_date);
            $data = [];
            
            $data['arrival'] =  $arrival;
            $data['offer'] =  $offer;
            $data['order'] =  $order;
            $data['ceiling'] = $ceiling;
            $data['avg_agmark'] = $avg_agmark;
            $data['avg_purchase'] = $avg_purchase;
            $data['avg_weekly_purchase'] = $avg_weekly_purchase;
            $data['avg_yearly_purchase'] = $avg_yearly_purchase;
            $data['avg_weekly_auction_quantity'] = $avg_weekly_auction_quantity[$current_date];
            $data['avg_weekly_offer_quantity'] = $avg_weekly_offer_quantity[$current_date];
            $data['qty_total'] = (float)$data['avg_weekly_auction_quantity'] + (float)$data['avg_weekly_offer_quantity'];
            $data['avg_auction_purchase'] = $avg_auction_purchase[$current_date];
            $data['avg_weekly_offer_purchase'] = $avg_weekly_offer_purchase[$current_date];
            $data['avg_weekly_purchase_total'] = (float)$data['avg_auction_purchase'] + (float)$data['avg_weekly_offer_purchase'];
            $data['avg_weekly_auction_for_rate'] =  $avg_weekly_auction_for_rate[$current_date];
            $data['avg_weekly_offer_for_rate'] =  $avg_weekly_offer_for_rate[$current_date];
            $data['avg_weekly_offer_for_total'] = (float)$data['avg_weekly_auction_for_rate'] + (float)$data['avg_weekly_offer_for_rate'];
            $data['avg_yearly_auction_purchase'] =  $avg_yearly_auction_purchase;
            $data['avg_yearly_offer_purchase'] =  $avg_yearly_offer_purchase;
            $data['avg_yearly_purchase_total'] = (float)$data['avg_yearly_auction_purchase'] + (float)$data['avg_yearly_offer_purchase'];
            $data['avg_yearly_auction_for'] =  $avg_yearly_auction_for;
            $data['avg_yearly_offer_for'] =  $avg_yearly_offer_for;
            $data['avg_yearly_for_total'] = (float)$data['avg_yearly_auction_for'] + (float)$data['avg_yearly_offer_for'];
            $data['avg_yearly_auction_qty'] =  $avg_yearly_auction_qty;
            $data['avg_yearly_offer_qty'] =  $avg_yearly_offer_qty;
            $data['avg_yearly_qty_total'] = (float)$data['avg_yearly_auction_qty'] + (float)$data['avg_yearly_offer_qty'];
            $data['graph'] = $this->getGraphData($data);
        }
        return view('home.index_'.$user->role_view,['data'=>$data]);
    }

    private function getGraphData($data){
        $output = array ();
        foreach($data['avg_agmark'] as $key=>$value){
            $t1 = strtotime($key); 
            $year = date("Y",$t1);
            $month = date("m",$t1) - 1; // need to zero-index the month
            $day = date("d",$t1);
            $output[] = "[new Date($year, $month, $day), {$value},{$data['avg_purchase'][$key]},{$data['avg_weekly_purchase'][$key]},{$data['avg_yearly_purchase'][$key]}]";
        }
        return implode(',', $output);
    }

   
}

