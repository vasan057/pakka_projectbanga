<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class StudViewController extends Controller
{
public function index(){
    $users = DB::select('select * from mandis');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_user(){
    $users = DB::select('select * from users_basic');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_users',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_role(){
    $users = DB::select('select * from roles');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_roles',['users'=>$users]);
//return response()->json(array('mandis'=> $users), 200);
}
public function get_location(){
    $users = DB::select('select * from locations');
    //$users = DB::table('mandis')->get();
//$users = DB::select('select * from mandis');
//return json_encode($Response);
return view('stud_view_locations',['users'=>$users]);
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
}
