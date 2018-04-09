<?php
namespace App\Library;
use App\Model\Order;
use App\Model\NotificationEvent;
use App\Model\NotificationQueue;
use App\Model\MandiDailyPrice;
use App\Model\RoleMapping;
use App\Model\MandiCeilingPriceHistory;
use Illuminate\Database\Schema\Blueprint;
class General{

    public static function GetForPrice(Order $order){
        $final = NULL;
        if($order->forFreight){
            $freight_value = $order->forFreight->freight_value;
            $rate = (float) $order->order_price;
            $quantity = (float) $order->order_quantity;
            $lists = $order->forFreight->forlinelist;
            $sum_array = [$rate];
            foreach($lists as $list){
                $func = 'get'.ucfirst($list->data_type);
                $sum_array[] = self::$func($list->value,$rate,$list->base,$sum_array);
            }
            /**
             * forrate calulation
             * total_value is $sum_array * $quantity + freight_value
             * for_rate total value / quantity
             * other_rate is for_rate - $rate(base rate where in order table at initial)
             * base_value is $quantity * $rate(base rate where in order table at initial)
             * 
             */
            // return $sum_array;
            $total_value = (last($sum_array)*$quantity) + (float)$freight_value;
            $new_total  = last($sum_array) + (float)$freight_value;
            $for_rate  = $total_value / $quantity;
            $other_rate = $for_rate - $rate;
            $base_value =  (float)$quantity * $rate;
            $final= [
                'order_quantity'=>$quantity,
                'order_base_rate'=>$rate,
                'order_for_rate'=>round($new_total,2),
                'order_for_rate_old'=>round($for_rate,2),
                'order_other_rate'=>round($other_rate,2),
                'order_total_value'=>round($total_value,2),
                'order_base_value'=>round($base_value,2)
            ];
            return $final;
        }
    }

    private static function getFlat($value,$rate=NULL,$base=NULL,$sum_array=[]){
        return (float)$value;
    }
    private static function getPerc($value,$rate=NULL,$base=NULL,$sum_array=[]){
        $rate = (float)$rate;
        $value = (float)$value;
        $perc =0.0;
        if($base){
            $keys = explode('+',$base);
            $total=0.0;
            foreach($keys as $key){
                if(isset($sum_array[$key])) $total = $total+ (float)$sum_array[$key];
            }
            if($total > 0) $perc =  ($value/100)*$total;
        }else{
            $perc = ($value/100)*$rate;
        }
        return $perc;
    }
    private static function getTotal($value=NULL,$rate=NULL,$base=NULL,$sum_array=[]){
        $rate = (float)$rate;
        $keys = explode('+',$base);
        $total=0.0;
        foreach($keys as $key){
            if(isset($sum_array[$key])) $total = $total+ (float)$sum_array[$key];
        }
        return $total;
    }
    public static function getReversePrice(Order $order){
        $for_price = (float) $order->order_for_price;
        $offer = (float) $order->counter_price;
        // if offer price is available  then for_price should be offer
        if($offer >= 1) $for_price = $offer;
        $quantity  = (float) $order->order_quantity;
        $total_for_price = $for_price;
        // $total_for_price = $quantity * $for_price;
        if($for_price && $order->forFreight){
            $freight_value = $order->forFreight->freight_value;
            $total_for_price = $total_for_price - (float)$freight_value;
            // return (float)$freight_value;
             $with_commission = $total_for_price;
            //  return $with_commission;
            // Remove commision from above value with different percentage
            $lists = $order->forFreight->forlinelist;
            $commision = 0.0;
            $percent = 0.0; 
            $flat = 0.0;
            foreach($lists as $list){
                if(strtolower($list->data_type) == 'flat') $flat = $flat + (float)$list->value;
                if(strtolower($list->data_type) == 'perc' && !$list->base) $percent = $percent + (float)$list->value;
                if(strtolower($list->data_type) == 'perc' && $list->base) $commision = $commision + (float)$list->value;
            }
            // get total commission
            /**
             *          principle/(100+$commision)
             */
            $commision_price =   $with_commission/(100+$commision);
            // return $commision_price;
            $other_total = $with_commission - $commision_price;
            $other_total = $other_total - $flat;
            $percent = $percent/100;
            $percent = 1 + $percent;
            $final_base = $other_total / $percent;
            return round($final_base,2);
        }
    }

    public static function sendSMS($to,$msg){
        $url = env('SMS_URL');
        $user_id = env('SMS_USERNAME');
        $password = env('SMS_PASSWORD');
        $from = env('SMS_FROM');
        $api = env('SMS_API');
        $sub_api = env('SMS_SUB_API');
        $msg = urlencode($msg);
        $query = "userId={$user_id}&pass={$password}&appid={$api}&subappid={$sub_api}&contenttype=1&to={$to}&from={$from}&text={$msg}&selfid=true&alert=1&dlrreq=true";
        $url = $url.'?'.$query;
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
        return $result;
        
    }
    public static function sendOTP($to,$msg){
        $url = env('SMS_URL_OTP');
        $enterpriseid = env('SMS_ENTERPRISE');
        $subEnterpriseid = env('SMS_SUB_ENTERPRISE');
        $pusheid = env('SMS_PUSH_ID');
        $pushepwd = env('SMS_PUSH_PWD');
        $sender = env('SMS_SENDER');
        $msg = urlencode($msg);
        $query = "enterpriseid={$enterpriseid}&subEnterpriseid={$subEnterpriseid}&pusheid={$pusheid}&pushepwd={$pushepwd}&msisdn={$to}&msgtext={$msg}&sender={$sender}";
        $url = $url.'?'.$query;
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
        return $result;
        
    }

    public static function pushNotification($token,$message){
        $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';
        
        $fields = array(
            'to' => $token,
            'notification' => array('title' => 'Barley Procurement', 'body' => $message,'sound' => 'default'),
            'data' => array('message' => $message)
        );
 
        $headers = array(
            'Authorization:key=' . 'AAAAoqb3ClI:APA91bHLXBj0yi_gq_UroKakFYBZihAzqDlRuMjoD8HwUA4GsbdNRgTU6R2vqXnjGRO1ZtqgCaRmCuamyxz4KHwRfFEYBy16fcyvJa1YZ5o6IcrSgKBhjMtbx8Jxk7bWZBLGwhWUUjxX',
            'Content-Type:application/json'
        );		
        $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm); 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
        $result = curl_exec($ch);
       
        curl_close($ch);

        // return $result;
    }

    public static function broadcastNotification($datas,$subject,$sms_text,$user_id){
        $mobiles = [];
        $fcms = [];
        foreach($datas as $data){
            $mandi = $data->mandi;
            $msg = "Ceiling price notification";
        //    if(isset($mandi->mandi_name) && isset($data->ceiling) && isset($data->ceiling->ceiling_price)) $msg = "Ceiling price for ".$mandi->mandi_name."for ".date('d-m-Y h:i:s a')." is ".$data->ceiling->ceiling_price;
           if(isset($mandi->mandi_name) && isset($data->ceiling) && isset($data->ceiling->ceiling_price)) {
               $msg = "Barley auction price for ".$mandi->mandi_name." mandi is Rs ".round($data->ceiling->ceiling_price,2).". Updated at ".date('jS M Y h:i:s A').".";
           }
            if($mandi && count($mandi->users)){
                foreach($mandi->users as $user){
                    $mobiles[] = ['mobile'=>$user->mobile_1,'id'=>$user->id];
                }
            }
            $mobiles = array_filter($mobiles);
            $fcms = array_filter($fcms);
            if(count($fcms)) $fcms = array_unique($fcms);
            $notification = new NotificationEvent;
            $notification->event_id = $subject;
            $notification->template_sms = $sms_text;
            $notification->template_push = $msg;
            $notification->modified_by = $user_id;
            $notification->save();
            
            foreach($mobiles as $mobile){
                $notify = new NotificationQueue;
                $notify->notification_id = $notification->id;
                $notify->mode = '1';
                $notify->mobile = $mobile['mobile'];
                $notify->user_id = $mobile['id'];
                $notify->actual_message = $msg;
                $notify->save();
               $res = self::sendSMS($mobile['mobile'],$msg);
            }
            foreach($fcms as $fcm){
                $notify = new NotificationQueue;
                $notify->notification_id = $notification->id;
                $notify->actual_message = $msg;
                $notify->mode = '1';
                $notify->fcm_token = $fcm;
                $notify->save();
              $res = self::pushNotification($fcm,$msg);
            //   print_r($res);
            }
        }
    }

    public static function getViews(){
        $web = [
            "Arrival Data" => "mandi-daily-price",
            "View Ceiling" => "ceiling/view",
            "Manage Order" => "order",
            "Manage Offer" => "offer",
            "Agmarknet Upload"=>"agmarknet-upload",
            'User Master'=> 'users',
            'Mandi Master'=> 'mandi',
            'Roles Master'=> 'role',
            //'Roles Master'=> 'view-roles',
            'Locations Master'=> 'location',
            'States Master'=> 'state',
            //'States Master'=> 'view-states',
            'Competitors Master'=> 'competitor',
            //'Competitors Master'=> 'view-competitors',
            'Buyer/Competitors'=> 'competitor',
            //'Buyer/Competitors'=> 'view-competitors',
            'Destination Master'=> 'destination',
            //'Destination Master'=> 'view-destinations',
            'Mandi Destination Master'=> 'mandidestination',
            //'Mandi Destination Master'=> 'view-mandi-destination',
            'FOR Line Items'=> 'forline',
            //'FOR Line Items'=> 'for-line-items',
            'FOR Freight'=> 'forreight',
            //'FOR Freight'=> 'for-freight-get',
            'Agmark Master'=> 'agmark',
            //'Agmark Master'=> 'view-agmarks',
            'Mandi User Mapping'=> 'mandiusermap',
            //'Mandi User Mapping'=> 'view-mandi-user',
            'Role Manager'=> 'role-manager'
        ];
        $mob = [
            'home.ts'=> 'Arrival Data',
            'arrival-data-view.ts'=> 'Arrival Data View',
            'ceiling-price.ts'=> 'Auction Dashboard',
            'ceiling-price-web.ts'=> 'Auction Price View',
            'order-creation.ts'=> 'Order Creation',
            'orders-dashboard.ts'=> 'Order Approver View',
            'orders-dashboard-view-two.ts'=> 'Order Creator View',
            'offer-creation.ts'=> 'Offer Creation',
            'offer-creator-view.ts'=> 'Offer Creator View',
            'offer-approver-view.ts'=> 'Offer Approver View',
            'counter-offer-creator-view.ts'=> 'CounterOffer Creator View',
            'counter-offer-approver-view.ts'=> 'CounterOffer Approver View'
        ];

        return ['Website'=>$web,'Mobile'=>$mob];
    }

    public static function getMenu(){
        $arr = [
            'Auction'=> [
                'Arrival Data',
                'Ceiling Price',
                'Agmarknet Upload',
                'View Ceiling'
            ],
            'Orders' => [
                'Manage Order',
                'Manage Offer'
            ],
            'Master Data' => [
                'User Master',
                'Mandi Master',
                'Roles Master',
                'Locations Master',
                'States Master',
                'Competitors Master',
                'Buyer/Competitors',
                'Destination Master',
                'Mandi Destination Master',
                'FOR Line Items',
                'FOR Freight',
                'Agmark Master',
                'Mandi User Mapping',
                'Role Manager'
            ]
            ];

            return $arr;
    }

    public static function newSms($to,$msg){
        $msg_id = env('MSG_ID');
        $auth_key = env('MSG_AUTH_KEY');
        $msg = urlencode($msg);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=$msg_id&route=4&mobiles=$to&authkey=$auth_key&country=91&message=$msg",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        // echo "cURL Error #:" . $err;
        } else {
        // echo $response;
        }
    }

    public static function ceilingHistory($ceilings,$user_id){
        $min = MandiDailyPrice::where(['date'=>date('Y-m-d'),'isSubmit'=>1])->min('min');
        $avg = 0;
        $modal = 0;
        $suggest = 0;
        $historys = [];
        $i = 0;
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
            $historys[$i]['avg_buying'] = $avg;
            $historys[$i]['modal'] = $modal;
            $historys[$i]['suggest'] = $suggest;
            $historys[$i]['mandi_name'] = $ceiling->mandi->short_name;
            $historys[$i]['ceiling_price'] = $ceiling->ceiling->ceiling_price;
            $historys[$i]['mandi_daily_price_id'] = $ceiling->id;
            $historys[$i]['min_price'] = $ceiling->min;
            $historys[$i]['max_price'] = $ceiling->max;
            $historys[$i]['quantity'] = $ceiling->quantity;
            $i++;
        }
        foreach($historys as $history){
            $noti_history = new MandiCeilingPriceHistory;
            $noti_history->mandi_name = $history['mandi_name'];
            $noti_history->ceiling_price = $history['ceiling_price'];
            $noti_history->avg_buying = $history['avg_buying'];
            $noti_history->modal = $history['modal'];
            $noti_history->suggest = $history['suggest'];
            $noti_history->min_price = $history['min_price'];
            $noti_history->max_price = $history['max_price'];
            $noti_history->mandi_daily_price_id = $history['mandi_daily_price_id'];
            $noti_history->quantity = $history['quantity'];
            $noti_history->created_by = $user_id;
            $noti_history->updated_by = $user_id;
            $noti_history->save();
        }
       

    }

    public static function checkSequence(){
        $seq = \App\Model\OrderSequence::first();
        $year = date('y');
        $order =  $seq->order_sequence;
        $order = substr($order,0,2);
        if($order != $year){
            $seq->delete();
            $new_seq = new \App\Model\OrderSequence;
            $new_seq->order_sequence = $year."100001";
            $new_seq->next_order_sequence = $year."100001";
            $new_seq->offer_sequence = $year."000001";
            $new_seq->next_offer_sequence = $year."000001";
            $new_seq->offerorder_sequence = $year."200001";
            $new_seq->next_offerorder_sequence = $year."200001";
            $new_seq->save();
        }
    }

    public static function schemaChange(){
        // \Schema::table('password_resets', function ($table) { $table->dropColumn('token');  });
        // \Schema::table('password_resets', function ($table) { $table->string('token')->nullable();  });
        // $table->string('token')->nullable();
        // \Schema::table('agmarknet', function (Blueprint $table) {
        //     $table->integer('created_by')->nullable();
        // $table->integer('updated_by')->nullable();
        // });
        RoleMapping::insert([
            ['role_id' => '1','menu' => 'Role Manager','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1']
        ]);
       
        
    }
}
