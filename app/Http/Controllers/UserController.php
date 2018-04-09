<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UsersBasic;
use App\Http\Requests;
use Validator;

class UserController extends Controller
{
    public function getIndex(Request $request){

        $users = UsersBasic::orderBy('id','desc')->paginate(20);
        return view('user.index',['users'=>$users]);
    }
    public function postIndex(Request $request){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'user_id' =>'required|alpha_num_underscore|unique:users_basic,user_id',
                'email_1' => 'required|email|unique:users_basic,email_1',
                'email_2' => 'email',
                'password' => 'required',
                'mobile_1' => 'required|mobile|unique:users_basic,mobile_1',
                'mobile_2' => 'mobile',
                'address_1' => 'required',
                'pincode' => 'required|pincode',
                'roles_id' => 'required',
                'gstin'=>'alpha_alphanum',
                'active' => 'required'
            ],[
                'gstin.required_if'=>'The :attribute is required.'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = UsersBasic::where(['user_id'=>$request->user_id])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $user = new UsersBasic;
        $user->user_id = $request->user_id;
        $user->password = bcrypt($request->password);
        $user->mobile_1 = $request->mobile_1;
        $user->mobile_2 = $request->mobile_2;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->pincode = $request->pincode;
        $user->gstin = $request->gstin;
        $user->roles_id = $request->roles_id;
        $user->email_1 = $request->email_1;
        $user->email_2 = $request->email_2;
        $user->active = $request->active;
        $user->save();
        return response()->json(['success'=>"success"]);

    }

    public function postUpdate(Request $request,$id){
        $validate= Validator::make(
            $request->all(),
            [   
                'user_id' =>'required|alpha_num_underscore|unique:users_basic,user_id,'.$id,
                'email_1' => 'required|email|unique:users_basic,email_1,'.$id,
                'email_2' => 'email',
                'mobile_1' => 'required|mobile|unique:users_basic,mobile_1,'.$id,
                'mobile_2' => 'mobile',
                'address_1' => 'required',
                'pincode' => 'required|pincode',
                'roles_id' => 'required',
                'gstin'=>'alpha_alphanum',
                'active' => 'required'
            ],
            [
                'gstin.required_if'=>'The :attribute is required.'
            ]

        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $user = UsersBasic::find($id);
        $user->user_id = $request->user_id;
        $user->mobile_1 = $request->mobile_1;
        $user->mobile_2 = $request->mobile_2;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->pincode = $request->pincode;
        $user->gstin = $request->gstin;
        $user->roles_id = $request->roles_id;
        $user->email_1 = $request->email_1;
        $user->email_2 = $request->email_2;
        $user->active = $request->active;
        $user->save();
        return response()->json(['success'=>"success"]);

    }

    public function getUserDetails($id){
        $users = UsersBasic::find($id);
        return response()->json(['success'=>$users]);
    }

   

}
