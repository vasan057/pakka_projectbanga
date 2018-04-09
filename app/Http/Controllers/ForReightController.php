<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Model\ForFreight;

class ForReightController extends Controller
{
    public function getIndex(Request $request){
		$forfreights = ForFreight::get();
        return view('foreight.index',['forfreights'=>$forfreights]);
    }
    public function getForReightDetails($id){
        $mandi = ForFreight::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }
    public function postIndex(Request $request){
        $duplicate = false;
        $validate = Validator::make($request->all(),[
            'mandi_id' => 'required',
            'destination_id' => 'required',
            'gid' =>'required',
            'freight_value' => 'required|positive_number',
            'valid_from' => 'required|before:valid_to',
            'valid_to' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = ForFreight::where('mandi_id',$request->mandi_id)
                            ->where('destination_id',$request->destination_id)
                            ->where('valid_from',$request->valid_from)
                            ->count();
        if($duplicate) return response()->json(['error'=>['Duplicate is not allowed']]);
        $forfreights = new ForFreight;
        $forfreights->mandi_id =$request->mandi_id;
        $forfreights->destination_id = $request->destination_id;
        $forfreights->gid = $request->gid;
        $forfreights->freight_value = $request->freight_value;
        $forfreights->valid_from = \Carbon\Carbon::parse($request->valid_from)->format('Y-m-d');
        $forfreights->valid_to = \Carbon\Carbon::parse($request->valid_to)->format('Y-m-d');
        $forfreights->created_by = \Auth::user()->id;
        $forfreights->save();
        //dd($forfreights);
        return response()->json(['success'=>'success']);

    }

    public function postUpdate(Request $request,$id){
        $duplicate = false;
        $validate = Validator::make($request->all(),[
            'mandi_id' => 'required',
            'destination_id' => 'required',
            'gid' =>'required',
            'freight_value' => 'required',
            'valid_from' => 'required|before:valid_to',
            'valid_to' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = ForFreight::where('mandi_id',$request->mandi_id)
                            ->where('destination_id',$request->destination_id)
                            ->where('valid_from',$request->valid_from)
                            ->whereNotIn('id',[$id])
                            ->count();
        if($duplicate) return response()->json(['error'=>['Duplicate is not allowed']]);
        $forfreights = ForFreight::find($id);
        $forfreights->mandi_id =$request->mandi_id;
        $forfreights->destination_id = $request->destination_id;
        $forfreights->gid = $request->gid;
        $forfreights->freight_value = $request->freight_value;
        $forfreights->valid_from = \Carbon\Carbon::parse($request->valid_from)->format('Y-m-d');
        $forfreights->valid_to = \Carbon\Carbon::parse($request->valid_to)->format('Y-m-d');
        $forfreights->updated_by = \Auth::user()->id;
        $forfreights->save();
        return response()->json(['success'=>'success']); 	

    }
}
