<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\AgmarkMaster;
use Validator;

class Agmarkcontroller extends Controller
{
    public function getIndex(Request $request){

        $agmark = AgmarkMaster::orderBy('id','desc')->get();
        //dd($roles);
        return view('agmark.index',['agmarks'=>$agmark]);
    }
    public function getAgmarkDetails($id){
        $mandi = AgmarkMaster::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }
    public function postIndex(Request $request){
       $user = \Auth::user();
        $duplicate = false;
        $validate = Validator::make($request->all(),[
            'location_id' => 'required',
            'market_name' =>'required',
            'active' => 'required'
            
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = AgmarkMaster::where('location_id',$request->location_id)
                            ->where('market_name',$request->market_name)
                            ->count();
        if($duplicate) return response()->json(['error'=>['Duplicate is not allowed']]);
        $agmarkmasters = new AgmarkMaster;
        $agmarkmasters->location_id =$request->location_id;
        $agmarkmasters->market_name = $request->market_name;
        $agmarkmasters->active = $request->active;
        $agmarkmasters->created_by = $user->id;
        $agmarkmasters->save();
        //dd($forfreights);
        return response()->json(['success'=>'success']);

    }

    public function postUpdate(Request $request,$id){
        $user = \Auth::user();

        $duplicate = false;
        $validate = Validator::make($request->all(),[
            'location_id' => 'required',
            'market_name' =>'required|unique:agmark_master,market_name,'.$id,
            'active' => 'required'
            
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $agmarkmasters = AgmarkMaster::findorfail($id);
        $agmarkmasters->location_id =$request->location_id;
        $agmarkmasters->market_name = $request->market_name;
        $agmarkmasters->active = $request->active;
        $agmarkmasters->updated_by = $user->id;
        $agmarkmasters->save();
        //dd($forfreights);
        return response()->json(['success'=>'success']);

    }
}
