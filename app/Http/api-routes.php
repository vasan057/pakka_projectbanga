<?php
Route::group(['prefix'=>'api','middleware'=>'cors'],function(){

    Route::controller('/ceiling','CeilingController');
    Route::controller('/role-manager','RoleManagerController');
    Route::post('order/for-rate','OrderController@postForRate');
    Route::post('order/for-rate-reverse','OrderController@postForRateReverse');
    Route::controller('order','OrderController');
    Route::controller('offer','OfferController');
    Route::controller('general','GeneralController');
    Route::controller('mandi-daily-price','MandiDailyPriceController');
    Route::get('/test-sms',function(){
        $gen = App\Library\General::sendSMS('9740355593','Dear BHoopal, you have successfully been registered with 9740355593');
        return $gen;
    });
    Route::get('/test-otp',function(){
        $gen = App\Library\General::sendOTP('9740355593','OTP to reset your password 123456. Validity 30 mins.');
        return $gen;
    });

    Route::controller('password','PasswordController');
});