<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\UserMandiMapping;
use App\Model\Mandi;
class StudViewController extends Controller
{

    public function __construct(){
        $this->middleware('role:admin');
    }
public function index(){

$mandis = Mandi::get();
return view('stud_view',['mandis'=>$mandis]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_user(){
    $users = DB::select('select u.id,u.user_id,u.password,u.mobile_1,u.mobile_2,u.address_1,u.address_2,u.pincode,u.gstin,r.role as roles_id,u.email_1,u.email_2,u.active from users_basic u JOIN roles r on u.roles_id=r.id');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_users',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_role(){
    $users = DB::select('select * from roles');
    return view('stud_view_roles',['users'=>$users]);
}
public function get_location(){
    // $users = DB::select('select * from locations');
    $users = DB::table('locations')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_locations',['locations'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_state(){
    $users = DB::select('select * from states');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_states',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_freight(){
    $users = DB::select('select * from for_freight');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_freights',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_lineitem(){
    $users = DB::select('select * from for_line_items');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_line_items',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_destination(){
    $users = DB::select('select * from destinations');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_destinations',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_competitor(){
    $users = DB::select('select * from competitors');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_competitors',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_agmark(){
    $users = DB::select('select * from agmark_master');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_agmarkmaster',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_mandiuser(){
    // $users = DB::select('select * from usermandimapping');

    $users = UserMandiMapping::paginate(20);
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_usermandimap',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_mandilocation(){
    $users = DB::select('select * from mandilocationmapping');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_mandilocationmap',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_userrole(){
    $users = DB::select('select * from userrolemapping');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_userrolemap',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_statelocation(){
    $users = DB::select('select * from statelocationmapping');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_statelocationmap',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_mandidestination(){

  

   $mandi_destination = \App\Model\MandiDestinationMapping::paginate(20);
   return view('stud_view_mandidestinationmap',['mandi_destinations'=>$mandi_destination]);
}
public function get_ceiling(){
    
     $users = DB::select('SELECT mdp.id, mdp.mandi_id, 
        (select mandi_name from mandis where id = mdp.mandi_id) as mandi_name, 
        mdp.isFrozen, mdp.date, mdp.quantity, mdp.min,
        mdp.max, AVG(ag.ag_min) as Avg_Buying, AVG(ag.ag_max) as Avg_Agmark, 
        AVG(ag.modal) as Modal_Price, Least(mdp.min,AVG(ag.ag_min),AVG(ag.ag_max)) as Suggested_Price 
        FROM agmarknet ag, mandi_daily_price mdp 
        where DATE(mdp.created_at) = CURDATE() GROUP by (mdp.mandi_id)');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);


return view('stud_view_ceiling',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
}
