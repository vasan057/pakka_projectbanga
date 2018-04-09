<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\UserMandiMapping;
use App\Model\Mandi;
use Validator;

class MandiUserController extends Controller
{
    public function getIndex(Request $request){

        $users = UserMandiMapping::orderBy('id','desc')->get();
        return view('mandiuser.index',['users'=>$users]);
    }
    public function getMandiUserDetails($id){
        $mandi = UserMandiMapping::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }
    public function postIndex(Request $request){
        $user = \Auth::user();
        $duplicate  = false;
        $validate = Validator::make($request->all(),[
            'user_id' =>'required',
            'mandi_id' => 'required',
            'active' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        foreach ($request->input('mandi_id') as $key => $value) {
            $duplicate = UserMandiMapping::where(['user_id'=>$request->user_id,'mandi_id'=>$value])->count();
                $user_mandi = new UserMandiMapping;
            if(empty($duplicate)){
                $user_mandi->user_id = $request->user_id;
                $user_mandi->mandi_id = $value;
                $user_mandi->created_by = $user->id;
                $user_mandi->updated_by = $user->id;
            }
                $user_mandi->active = $request->active;
                $user_mandi->save();
        }
        return response()->json(['success'=>'success']);

    }

    public function postUpdate(Request $request,$id){
        $duplicate  = false;
        $validate = Validator::make($request->all(),[
            'user_id' =>'required',
            'mandi_id' => 'required',
            'active' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        foreach ($request->input('mandi_id') as $key => $value) {
            $user_mandi = UserMandiMapping::find($id);
            $duplicate = UserMandiMapping::where(['user_id'=>$request->user_id,'mandi_id'=>$value])->count();
            if(empty($duplicate)){
                $user_mandi->user_id = $request->user_id;
                $user_mandi->mandi_id = $value;
            }
                $user_mandi->active = $request->active;
                $user_mandi->save();
        }
        return response()->json(['success'=>'success']);

    }
}
