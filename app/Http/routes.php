<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*  Route::get('/', function () {
   //return "<h1>hi<h1>";
    return view('welcome');
});  */

  /*  Route::get('/',function() {
    return view('pages/about');
    //return "hi";
});    */

/* Route::get('/',function() {
    return view('errors/503');
    //return "hi";

    
}); */

/* Route::get('/users/{id}', function ($id) {
    return "This is user ".$id;
     //return view('welcome');
 }); */

// Route::auth();
Route::post('getinsert','for_update@index_insert'); //For Insert on table
Route::post('mandi-insert','for_update@index_insert');
Route::controller('auth','AuthController');
Route::get('logout',function(){ Auth::logout(); return redirect()->to('auth/login'); });
Route::group(['middleware'=>'auth'],function(){

    Route::get('/home', 'HomeController@index'); 
    Route::get('/', 'HomeController@index'); 





});

Route::group(['middleware' => ['auth']],function(){
    Route::get('json',function(){
        return response()->json(['name' => 'Virat Gandhi', 'state' => 'Gujarat']);
    });
    Route::get('view-records','StudViewController@index');
    Route::get('view-users','StudViewController@get_user');//For user
    Route::get('view-roles','StudViewController@get_role');//For Role
    Route::get('view-locations','StudViewController@get_location');//For Locations
    Route::get('view-states','StudViewController@get_state');//For States
    Route::get('view-freights','StudViewController@get_freight');//For freight
    Route::get('view-lineitems','StudViewController@get_lineitem');//For freight
    Route::get('view-destinations','StudViewController@get_destination');//For destination
    Route::get('view-competitors','StudViewController@get_competitor');//For destination
    Route::resource('view-agmarks','AgmarkMastercontroller');//For Agmark Master
    Route::controller('agmark','Agmarkcontroller');//For Agmark Master
//  Route::get('view-agmarks','StudViewController@get_agmark');//For Agmark Master
    Route::get('view-mandi-user','StudViewController@get_mandiuser');//For Mandi User
    Route::controller('mandiusermap','MandiUserController');
    Route::get('view-mandi-location','StudViewController@get_mandilocation');//For Mandi Location
    Route::get('view-user-role','StudViewController@get_userrole');//For user role
    Route::get('view-state-location','StudViewController@get_statelocation');//For state location
    Route::get('view-mandi-destination','StudViewController@get_mandidestination');//For Mandi destination
    Route::get('for-details','ForDetailsController@index');//For Details
    Route::POST('for-details-getMandi','ForDetailsController@getMandi');//For Mandi Details
    Route::POST('for-details-getGID','ForDetailsController@getGID');//For GID Details
    Route::POST('for-details-getParameter','ForDetailsController@getParameter');//For Parameter Details
	Route::resource('for-freight-get','ForFreightGetController');
    Route::resource('for-line-items','ForLineItemcontroller');
    
    Route::POST('/getFall','for_update@getfreezeAll'); //For Update on table ceiling
    Route::POST('/getUNFall','for_update@getUNfreezeAll'); //For Update on table ceiling
    Route::POST('/getinsertCeiling','for_update@ceiling_insert'); //For Insert on ceiling price
    
    
    Route::get('insert','StudInsertController@insertform'); 
    Route::post('create','StudInsertController@insert');
    
    Route::get('edit-records','StudUpdateController@index'); 
Route::get('edit/{id}','StudUpdateController@show'); 
Route::post('edit/{id}','StudUpdateController@edit'); 
Route::get('ajax',function(){
    return view('message');
 });
 Route::controller('location','LocationController');
 
 Route::resource('user-mandi','UserMandiController');
 Route::POST('/getmsg','AjaxController@index');
 Route::POST('/getupd','for_update@updateMandi'); //For Update on table
// Route::POST('/getupdall','for_update@index'); //For Update on table
//  Route::POST('/getinsert','for_update@index_insert'); //For Insert on table
 Route::POST('/getinsertuser','for_update@user_insert'); //For Insert on User
 Route::POST('/getinsertrole','for_update@role_insert'); //For Insert on User
 Route::POST('/getinsertlocation','for_update@location_insert'); //For Insert on Location
 Route::POST('/getinsertstate','for_update@state_insert'); //For Insert on state
 Route::POST('/getinsertfreight','for_update@freight_insert'); //For Insert on Freight
 Route::POST('/getinsertlineitem','for_update@lineitem_insert'); //For Insert on Line Item
 Route::POST('/getinsertdestination','for_update@destination_insert'); //For Insert on destination
 Route::POST('/getinsertcompetitor','for_update@competitor_insert'); //For Insert on destination
 Route::POST('/getinsertagmark','for_update@agmark_insert'); //For Insert on agmark
 Route::POST('/getinsertmandiuser','for_update@mandiuser_insert'); //For Insert on Mandi User Mapping
 Route::POST('/getinsertmandilocation','for_update@mandilocation_insert'); //For Insert on Mandi Location Mapping
 Route::POST('/getinsertuserrole','for_update@userrole_insert'); //For Insert on User Role Mapping
 Route::POST('/getinsertstatelocation','for_update@statelocation_insert'); //For Insert on state location Mapping
 Route::POST('/getinsertmandidestination','for_update@mandidestination_insert'); //For Insert on state location Mapping
 
 Route::get('/getdropdownuser','for_update@getuserdrop'); //For user ID drop down
 Route::get('/getdropdownmandiagmark','for_update@getmandiagmarkdrop'); //For Agmark ID drop down
 Route::get('/getdropdownlocation','for_update@getmandilocationdrop'); //For Location ID drop down
 Route::get('/getdropdowncity','for_update@getmandicitydrop'); //For City ID drop down
 Route::get('/getdropdowndistrict','for_update@getmandidistrictdrop'); //For District ID drop down
 Route::get('/getdropdownstate','for_update@getmandistatedrop'); //For District ID drop down
 Route::get('/getdropdownrole','for_update@getuserroledrop'); //For District ID drop down
 Route::get('/getdropdowndestination','for_update@getdestinationdrop'); //For Destination ID drop down
 Route::get('/getdropdownmandi','for_update@getmandidrop'); //For Mandi ID drop down


 /* Route::get('import_agmarkmaster', 'MaatwebsiteDemoController@importExport');//For import agmarknet
 Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');//For export agmarknet
 Route::post('import_agmarkmaster', 'MaatwebsiteDemoController@importExcel'); //For import agmarknet
 Route::get('import_arrival', 'MaatwebsiteDemoController@importExport_arrival');//For import arrival
 Route::post('import_arrival', 'MaatwebsiteDemoController@importExcel_arrival'); */ //For import arrival
 //For Excel import export
Route::post('mandi-daily-price/excel-upload','MandiDailyPriceController@postExcelUpload');
Route::get('mandi-daily-price/update-submit','MandiDailyPriceController@getUpdateSubmit');
 Route::resource('mandi-daily-price','MandiDailyPriceController');
 //For Excel import Agmarknet
 Route::post('agmarknet-upload/excel-upload','AgmarknetController@postExcelUpload');
 Route::get('agmarknet-upload/update-submit','AgmarknetController@getUpdateSubmit');
  Route::resource('agmarknet-upload','AgmarknetController');

 Route::resource('order','OrderController');
    Route::get('edit/{id}','StudUpdateController@show'); 
    Route::post('edit/{id}','StudUpdateController@edit'); 
    Route::get('ajax',function(){
        return view('message');
    });
    Route::controller('location','LocationController');
    Route::controller('destination','DestinationController');
    Route::resource('user-mandi','UserMandiController');
    Route::POST('/getmsg','AjaxController@index');
    Route::POST('/getupd','for_update@updateMandi'); //For Update on table
    Route::POST('/getupdall','for_update@index'); //For Update on table
   
    Route::POST('/getinsertuser','for_update@user_insert'); //For Insert on User
    Route::POST('/getinsertrole','for_update@role_insert'); //For Insert on User
    Route::POST('/getinsertlocation','for_update@location_insert'); //For Insert on Location
    Route::POST('/getinsertstate','for_update@state_insert'); //For Insert on state
    Route::POST('/getinsertfreight','for_update@freight_insert'); //For Insert on Freight
    Route::POST('/getinsertlineitem','for_update@lineitem_insert'); //For Insert on Line Item
    Route::POST('/getinsertdestination','for_update@destination_insert'); //For Insert on destination
    Route::POST('/getinsertcompetitor','for_update@competitor_insert'); //For Insert on destination
    Route::POST('/getinsertagmark','for_update@agmark_insert'); //For Insert on agmark
    Route::POST('/getinsertmandiuser','for_update@mandiuser_insert'); //For Insert on Mandi User Mapping
    Route::POST('/getinsertmandilocation','for_update@mandilocation_insert'); //For Insert on Mandi Location Mapping
    Route::POST('/getinsertuserrole','for_update@userrole_insert'); //For Insert on User Role Mapping
    Route::POST('/getinsertstatelocation','for_update@statelocation_insert'); //For Insert on state location Mapping
    Route::POST('/getinsertmandidestination','for_update@mandidestination_insert'); //For Insert on state location Mapping
    
    Route::get('/getdropdownuser','for_update@getuserdrop'); //For user ID drop down
    Route::get('/getdropdownmandiagmark','for_update@getmandiagmarkdrop'); //For Agmark ID drop down
    Route::get('/getdropdownlocation','for_update@getmandilocationdrop'); //For Location ID drop down
    Route::get('/getdropdowncity','for_update@getmandicitydrop'); //For City ID drop down
    Route::get('/getdropdowndistrict','for_update@getmandidistrictdrop'); //For District ID drop down
    Route::get('/getdropdownstate','for_update@getmandistatedrop'); //For District ID drop down
    Route::get('/getdropdownrole','for_update@getuserroledrop'); //For District ID drop down
    Route::get('/getdropdowndestination','for_update@getdestinationdrop'); //For Destination ID drop down
    Route::get('/getdropdownmandi','for_update@getmandidrop'); //For Mandi ID drop down
    
    
    Route::get('import_agmarkmaster', 'MaatwebsiteDemoController@importExport');//For import agmarknet
    Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');//For export agmarknet
    Route::post('import_agmarkmaster', 'MaatwebsiteDemoController@importExcel'); //For import agmarknet
    Route::get('import_arrival', 'MaatwebsiteDemoController@importExport_arrival');//For import arrival
    Route::post('import_arrival', 'MaatwebsiteDemoController@importExcel_arrival'); //For import arrival
    //For Excel import export
    Route::post('mandi-daily-price/excel-upload','MandiDailyPriceController@postExcelUpload');
    Route::get('mandi-daily-price/update-submit','MandiDailyPriceController@getUpdateSubmit');
    Route::get('mandi-daily-price/submit/{id}','MandiDailyPriceController@getSubmit');
    Route::resource('mandi-daily-price','MandiDailyPriceController');
    Route::post('order/submit','OrderController@postSubmit');
    Route::post('order/accept','OrderController@postAccept');
    Route::post('order/reject','OrderController@postReject');
    Route::resource('order','OrderController');
    Route::controller('mandi','MandiController');

    //New controller for edit
    Route::controller('users','UserController');
    Route::controller('role','RoleController');
    Route::controller('state','StateController');
    Route::controller('forline','ForLineController');
    Route::controller('forreight','ForReightController');
    Route::controller('competitor','CompetitorController');
    Route::controller('destination','DestinationController');   
    Route::controller('mandidestination','MandiDestinationController');   

    Route::any('role_details/{id}','RoleController@getRoleValue');
    Route::any('mandi-destination-update/{id}','MandiDestinationController@getUpdates');

    // offer routes
    Route::post('offer/accept','OfferController@postAccept');
    Route::post('offer/reject','OfferController@postReject');
    Route::resource('offer','OfferController');

    // ceiling

    // Route::get('view-ceilings',function(){ redirect()->to('ceiling/view'); });//For Ceiling Price
    Route::get('view-ceilings','StudViewController@get_ceiling');
    Route::controller('ceiling','CeilingController');
    Route::controller('role-manager','RoleManagerController');

}); // end role based

Route::get('for-rate/{code}','ForDetailsController@getForPrice');
Route::get('price',function(){
    $order = \App\Model\Order::find(1);
    $price = \App\Library\General::GetForPrice($order);
    return view('home');
});

Route::get('test-sms',function(){
    $gen = \App\Library\General::sendSMS('9740355593','Barley auction price for Bansure mandi is Rs 346. Updated at 12th Jan 2018.');
});

Route::get('console',function(){
    // \Log::info(date('m:i:s'));
    // $shellCommand = "php /var/www/html/digi/artisan quote:send 1>> /dev/null 2>&1 &";
    //         $commandResult = shell_exec($shellCommand);
    // \Log::info(date('m:i:s'));

});
