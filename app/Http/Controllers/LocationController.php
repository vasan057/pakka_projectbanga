<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Location;
use App\Model\State;
use App\Http\Requests;
use Validator;

class LocationController extends Controller
{
    public function getIndex(){
        $location = Location::get();
        return view('location.index',['locations'=>$location]);
    }

    public function postIndex(Request $request){
        $duplicate = false;
        $rules = [
            'State' => 'required',
            'District' => 'required',
            'Town_City' =>'required|unique:locations,Town_City',
            'is_active' => 'required'
        ];
        $message = ['Town_City.unique'=>'Duplicate record is not allowed'];
        $validate = Validator::make($request->all(),$rules,$message);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $state  = State::where('state_name',$request->State)->first();
        $state_id =1;
        if($state) $state_id = $state->id;
        $location = new Location;
        $location->state_id = $state_id; 
        $location->State =$request->State;
        $location->District = $request->District;
        $location->Town_City = $request->Town_City;
        $location->is_active = $request->is_active;
        $location->created_by = \Auth::user()->id;
        $location->save();
        return response()->json(['success'=>'success']);
    }
     public function postUpdate(Request $request){
        $duplicate = false;
        $rules = [
            'State' => 'required',
            'District' => 'required',
            'Town_City' =>'required|unique:locations,Town_City,'.$request->input('edit_id',NULL),
            'is_active' => 'required'
        ];
        $message = ['Town_City.unique'=>'Duplicate record is not allowed'];
        $validate = Validator::make($request->all(),$rules,$message);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $state  = State::where('state_name',$request->State)->first();
        $state_id =1;
        if($state) $state_id = $state->id;
        $location = Location::findorfail($request->input('edit_id',NULL));
        $location->state_id = $state_id; 
        $location->State =$request->State;
        $location->District = $request->District;
        $location->Town_City = $request->Town_City;
        $location->is_active = $request->is_active;
        $location->updated_by = \Auth::user()->id;
        $location->save();
        return response()->json(['success'=>'success']);
    }

    public function putIndex(Request $request,$id){
        $duplicate = false;
        $validate = Validator::make($request->all(),[
            'State' => 'required|email',
            'District' => 'required',
            'Town_City' =>'required',
            'is_active' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = Location::where('State',$request->State)
                            ->where('District',$request->District)
                            ->where('Town_City',$request->Town_City)
                            ->whereNotIn('id',[$id])
                            ->count();
        if($duplicate) return response()->json(['error'=>['Duplicate is not allowed']]);
        $state  = State::where('state_name',$request->State)->first();
        $state_id =1;
        if($state) $state_id = $state->id;
        $location = Location::find($id);
        $location->state_id = $state_id;
        $location->State =$request->State;
        $location->District = $request->District;
        $location->Town_City = $request->Town_City;
        $location->is_active = $request->is_active;
        $location->save();
        return response()->json(['success'=>'success']);
    }

    public function getLocationDetails($id){
        $mandi = Location::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }

    public function getAllLocation(){
        $location = Location::all();
        return response()->json(['success'=>$location]);
    }
   
}
