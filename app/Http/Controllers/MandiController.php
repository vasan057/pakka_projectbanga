<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mandi;
use App\Http\Requests;
use Validator;

class MandiController extends Controller
{
    public function getIndex(Request $request){

        $mandis = Mandi::orderBy('id','desc')->get();
        return view('mandi.index',['mandis'=>$mandis]);
    }
    public function postIndex(Request $request){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'mandi_name' =>'required|alpha_num_space_underscore',
                'agmark_market' => 'required',
                'location' => 'required',
                'short_name' => 'required|alpha_num_space_underscore',
                'address_1' => 'required',
                'pincode' => 'required|regex:/^[1-9][0-9]{5}$/',
                'destination_id' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = Mandi::where(['short_name'=>$request->short_name,'agmark_market_id'=>$request->agmark_market])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $mandi = new Mandi;
        $mandi->mandi_name = $request->mandi_name;
        $mandi->agmark_market_id = $request->agmark_market;
        $mandi->location_id = $request->location;
        $mandi->short_name = $request->short_name;
        $mandi->address_1 = $request->address_1;
        $mandi->address_2 = $request->address_2;
        $mandi->pincode = $request->pincode;
        $mandi->city = $request->input('city',"  ");
        $mandi->district = $request->input('district','   ');
        $mandi->state = $request->input('state','  ');
        $mandi->user_id = \Auth::user()->id;
        $mandi->destination_id = $request->destination_id;
        $mandi->created_by = \Auth::user()->id;
        $mandi->save();
        return response()->json(['success'=>"success"]);

    }

    public function postUpdate(Request $request,$id){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'mandi_name' =>'required|alpha_num_space_underscore',
                'agmark_market' => 'required',
                'location' => 'required',
                'short_name' => 'required|alpha_num_space_underscore',
                'address_1' => 'required',
                'pincode' => 'required|regex:/^[1-9][0-9]{5}$/',
                'destination_id' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = Mandi::where(['short_name'=>$request->short_name,'agmark_market_id'=>$request->agmark_market])->whereNotIn('id',[$id])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $mandi = Mandi::find($id);
        $mandi->mandi_name = $request->mandi_name;
        $mandi->agmark_market_id = $request->agmark_market;
        $mandi->location_id = $request->location;
        $mandi->short_name = $request->short_name;
        $mandi->address_1 = $request->address_1;
        $mandi->address_2 = $request->address_2;
        $mandi->pincode = $request->pincode;
        $mandi->city = $request->city;
        $mandi->district = $request->district;
        $mandi->state = $request->state;
        $mandi->user_id = \Auth::user()->id;
        $mandi->destination_id = $request->destination_id;
        $mandi->updated_by = \Auth::user()->id;
        $mandi->save();
        return response()->json(['success'=>"success"]);

    }

    public function getMandiByDestination($id){
        $mandi = Mandi::find($id);
        $destination = [];
        if($mandi->destination) $destination = [['short_name' => $mandi->destination->short_name,'id'=>$mandi->destination->id]];
        $destinations = $mandi->destinations()->select(['destinations.short_name','destinations.id'])->get();
        $destinations = array_merge($destination,$destinations->toArray());
        return response()->json(['success'=>$destinations]);
    }

    public function getArthiyaByMandi($id){
        $user = \Auth::user();
        $mandi = Mandi::find($id);
        if($user->roles_id == '2'){
            $users = $mandi->userMap()->where(['users_basic.roles_id'=>2,'users_basic.id'=>$user->id,'usermandimapping.active'=>'1'])->get(['users_basic.user_id','users_basic.id']);
        }else{
            $users = $mandi->userMap()->where(['users_basic.roles_id'=>2,'usermandimapping.active'=>'1'])->get(['users_basic.user_id','users_basic.id']);
        }
        return response()->json(['success'=>$users]);
    }


    public function getMandiDetails($id){
        $mandi = Mandi::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }

    
}
