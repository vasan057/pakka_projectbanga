<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserMandiMapping;
use App\Http\Requests;
use Validator;

class UserMandiController extends Controller
{
    public function index(){
        $users =  UserMandiMapping::get(); 
        return view('stud_view_usermandimap',['users'=>$users]);
    }
    public function create()
    {
        //
    }
    public function show($id){
        $user_mandi = UserMandiMapping::where('id',$id)->with('user')->with('mandi')->first();
        return response()->json(['data'=>$user_mandi]); 
    }

    public function store(Request $request){
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
            if(empty($duplicate)){
                $user_mandi = new UserMandiMapping;
                $user_mandi->user_id = $request->user_id;
                $user_mandi->mandi_id = $value;
                $user_mandi->active = $request->active;
                $user_mandi->created_by = $user->id;
                $user_mandi->updated_by = $user->id;
                $user_mandi->save();
            }
        }
        return response()->json(['success'=>'success']);
        
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request,$id){
        $duplicate  = false;
        $validate = Validator::make($request->all(),[
            'user_id' =>'required',
            'mandi_id' => 'required',
            'active' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        foreach ($request->input('mandi_id') as $key => $value) {
            $duplicate = UserMandiMapping::where(['user_id'=>$request->user_id,'mandi_id'=>$value])->count();
            if(empty($duplicate)){
                $user_mandi = UserMandiMapping::find($id);
                $user_mandi->user_id = $request->user_id;
                $user_mandi->mandi_id = $value;
                $user_mandi->active = $request->active;
                $user_mandi->save();
            }
        }
        return response()->json(['success'=>'success']);
        
    }

    public function destroy($id)
    {
        //
    }
}
