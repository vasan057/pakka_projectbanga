<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Role;
use App\Http\Requests;
use Validator;

class RoleController extends Controller
{
    public function getIndex(Request $request){

        $roles = Role::orderBy('id','desc')->get();
        //dd($roles);
        return view('role.index',['roles'=>$roles]);
    }
    public function getRoleDetails($id){
        $mandi = Role::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }
    public function postIndex(Request $request){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'role' =>'required',
                'active' => 'required'
            ]
        );
        $users_id = \Auth::user()->id;
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = Role::where(['role'=>$request->role])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $role = \DB::table('roles')->insert(['role'=>$request->role,'active'=>$request->active,'created_by' => $users_id]);
        return response()->json(['success'=>"success"]);

    }

    public function postUpdate(Request $request,$id){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'role' =>'required',
                'active' => 'required'
            ]
        );
        $users_id = \Auth::user()->id;
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = Role::where(['role'=>$request->role])->whereNotIn('id',[$id])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $role = \DB::table('roles')->where('id',$id)->update(['role'=>$request->role,'active'=>$request->active,'updated_by' => $users_id]);
        return response()->json(['success'=>"success"]);

    }

    /* public function getMandiByDestination($id){
        $mandi = Role::find($id);
        $destination = [];
        if($mandi->destination) $destination = [['short_name' => $mandi->destination->short_name,'id'=>$mandi->destination->id]];
        $destinations = $mandi->destinations()->select(['destinations.short_name','destinations.id'])->get();
        $destinations = array_merge($destination,$destinations->toArray());
        return response()->json(['success'=>$destinations]);
    }

    public function getArthiyaByMandi($id){
        $mandi = Role::find($id);
        $users = $mandi->userMap()->where('roles_id',2)->get(['users_basic.user_id','users_basic.id']);
        return response()->json(['success'=>$users]);
    }


    public function getMandiDetails($id){
        $mandi = Role::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    } */
}
