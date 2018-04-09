<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\State;
use App\Http\Requests;
use Validator;

class StateController extends Controller
{
    public function getIndex(Request $request){

        $states = State::orderBy('id','desc')->get();
        return view('state.index',['states'=>$states]);
    }
    public function postIndex(Request $request){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   

                'state_name' =>'required|unique:states,state_name',
                'sort_order' =>'required|unique:states,sort_order|positive_integer',
                'sort_name' =>'required|unique:states,short_name',
                'status' =>'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $state = new State;
        $state->state_name = $request->state_name;
        $state->sort_order = $request->sort_order;
        $state->short_name = $request->sort_name;
        $state->status = $request->status;
        $state->created_by = \Auth::user()->id;
        $state->save();
        return response()->json(['success'=>"success"]);

    }

    public function postUpdate(Request $request,$id){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                
                'state_name' =>'required|unique:states,state_name,'.$id,
                'sort_order' =>'required|positive_integer|unique:states,sort_order,'.$id,
                'sort_name' =>'required|unique:states,short_name,'.$id,
                'status' =>'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $state = State::find($id); 
        $state->state_name = $request->state_name;
        $state->sort_order = $request->sort_order;
        $state->short_name = $request->sort_name;
        $state->status = $request->status;
        $state->updated_by = \Auth::user()->id;
        $state->save();
        return response()->json(['success'=>"success"]);

    }

    public function getStateDetails($id){
        $mandi = State::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }

    /* public function getMandiByDestination($id){
        $mandi = State::find($id);
        $destination = [];
        if($mandi->destination) $destination = [['short_name' => $mandi->destination->short_name,'id'=>$mandi->destination->id]];
        $destinations = $mandi->destinations()->select(['destinations.short_name','destinations.id'])->get();
        $destinations = array_merge($destination,$destinations->toArray());
        return response()->json(['success'=>$destinations]);
    }

    public function getArthiyaByMandi($id){
        $mandi = State::find($id);
        $users = $mandi->userMap()->where('roles_id',2)->get(['users_basic.user_id','users_basic.id']);
        return response()->json(['success'=>$users]);
    }


    public function getMandiDetails($id){
        $mandi = State::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    } */
}
