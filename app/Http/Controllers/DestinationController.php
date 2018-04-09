<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Model\Destination;

class DestinationController extends Controller
{
    public function getIndex(){
        $destinations = Destination::orderBy('id','desc')->get();
        return view('destination.index',['destinations'=>$destinations]);
    }
    public function getDestinationDetails($id){
        $mandi = Destination::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }
    public function postIndex(Request $request){
        $validate = Validator::make($request->all(),[
            'delivery_type' => 'required',
            'delivery_name' => 'required',
            'short_name' => 'required|unique:destinations,short_name',
            'address_1' => 'required',
            'pincode' => 'required',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'mobile_1' => 'mobile',
            'mobile_2' => 'mobile',
            'email_1' => 'email',
            'email_2' => 'email'
        ]);

        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $destination = new Destination;
        $destination->delivery_type = $request->delivery_type; 
        $destination->delivery_name = $request->delivery_name; 
        $destination->short_name = $request->short_name; 
        $destination->address_1 = $request->address_1; 
        $destination->address_2 = $request->address_2; 
        $destination->pincode = $request->pincode; 
        $destination->city = $request->city; 
        $destination->district = $request->district; 
        $destination->state = $request->state; 
        $destination->mobile_1 = $request->mobile_1; 
        $destination->mobile_2 = $request->mobile_2; 
        $destination->email_1 = $request->email_1; 
        $destination->email_2 = $request->email_2; 
        $destination->gstin = $request->gstin; 
        $destination->created_by = \Auth::user()->id;
        $destination->save();
        return response()->json(['success'=>$destination]);
        
    }
    
    public function postUpdate(Request $request,$id){
        $validate = Validator::make($request->all(),[
            'delivery_type' => 'required',
            'delivery_name' => 'required',
            'short_name' => 'required|unique:destinations,short_name,'.$id,
            'address_1' => 'required',
            'pincode' => 'required',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'mobile_1' => 'mobile',
            'mobile_2' => 'mobile',
            'email_1' => 'email',
            'email_2' => 'email'
        ]);

        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $destination = Destination::findorfail($id);
        $destination->delivery_type = $request->delivery_type; 
        $destination->delivery_name = $request->delivery_name; 
        $destination->short_name = $request->short_name; 
        $destination->address_1 = $request->address_1; 
        $destination->address_2 = $request->address_2; 
        $destination->pincode = $request->pincode; 
        $destination->city = $request->city; 
        $destination->district = $request->district; 
        $destination->state = $request->state; 
        $destination->mobile_1 = $request->mobile_1; 
        $destination->mobile_2 = $request->mobile_2; 
        $destination->email_1 = $request->email_1; 
        $destination->email_2 = $request->email_2; 
        $destination->gstin = $request->gstin; 
        $destination->updated_by = \Auth::user()->id;
        $destination->save();
        return response()->json(['success'=>$destination]);

    }
}
