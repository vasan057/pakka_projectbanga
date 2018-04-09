<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\MandiDestinationMapping;
use App\Model\Destination;
use App\Http\Requests;
use App\Model\Mandi;
use Validator;
class MandiDestinationController extends Controller
{
    public function getIndex(Request $request){

        $mandidestinations = MandiDestinationMapping::orderBy('id','desc')->get();
        $mandi = Mandi::orderBy('id','desc')->get();
        $destination = Destination::orderBy('id','desc')->get();
        return view('mandidestination.index',['mandidestinations'=>$mandidestinations,'destination'=>$destination,'mandi'=>$mandi]);
    }
    public function postIndex(Request $request){
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'destination_id' =>'required|unique:mandidestinationmapping,destination_id',
                'mandi_id' => 'required|unique:mandidestinationmapping,mandi_id',                
                'active' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $mandidestination = new MandiDestinationMapping;
        $mandidestination->destination_id = $request->destination_id;
        $mandidestination->mandi_id = $request->mandi_id;
        $mandidestination->active = $request->active;
        $mandidestination->created_by = \Auth::user()->id;
        $mandidestination->save();
        return response()->json(['success'=>"success"]);
    }

    public function getUpdates(Request $request,$id){
        $duplicate = false;
        $users_id = \Auth::user()->id;
        $validate= Validator::make(
            $request->all(),
            [   
                'destination_id' =>'required|unique:mandidestinationmapping,destination_id,'.$id,
                'mandi_id' => 'required|unique:mandidestinationmapping,mandi_id,'.$id,               
                'active' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        
        $user = MandiDestinationMapping::where('id',$id)->update(['destination_id'=>$request->destination_id,'mandi_id'=>$request->mandi_id,'active'=>$request->active,'updated_by'=>$users_id]);
        return response()->json(['success'=>"success"]);

    }
    public function getMandiDestinationDetails($id){
        $mandi = MandiDestinationMapping::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }

}
