<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoleMapping;
use App\Http\Requests;
use Validator;

class RoleManagerController extends Controller
{
    public function getIndex(Request $request){
        $role_mappings = RoleMapping::get();
        return view('role_manager.index',['role_mappings'=>$role_mappings]);
    }

    public function postIndex(Request $request){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'role' =>'required',
                'device' =>'required',
                'menu' =>'required',
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $role =  $request->role;
        $device = $request->device;
        $menu = $request->menu;
        $duplicate = RoleMapping::where(['role_id'=>$role,'menu'=>$menu,'device_type'=>$device])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $map = new RoleMapping;
        $map->role_id = $role;
        $map->device_type = $device;
        $map->menu = $menu;
        $map->created_by = \Auth::user()->id;
        $map->save();
        return response()->json(['success'=>"success"]);
    }

    public function postUpdate(Request $request,$id){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'role' =>'required',
                'device' =>'required',
                'menu' =>'required',
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $role =  $request->role;
        $device = $request->device;
        $menu = $request->menu;
        $duplicate = RoleMapping::whereNotIn('id',[$id])->where(['role_id'=>$role,'menu'=>$menu,'device_type'=>$device])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $map = RoleMapping::find($id);
        $map->role_id = $role;
        $map->device_type = $device;
        $map->menu = $menu;
        $map->updated_by = \Auth::user()->id;
        $map->save();
        return response()->json(['success'=>"success"]);
    }

    public function getShow(Request $request,$id){
        $role_mappings = RoleMapping::find($id);
            return response()->json(['success'=>$role_mappings]);
    }

    public function getStatus($id){
        $role = RoleMapping::find($id);
        $role->is_active = $role->is_active?0:1;
        $role->save();
        return back()->with('status','Successfuly updated');
    }
}
