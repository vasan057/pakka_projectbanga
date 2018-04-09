<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Competitor;
use App\Http\Requests;
use Validator;
class CompetitorController extends Controller
{
    public function getIndex(Request $request){

        $competitors = Competitor::orderBy('id','desc')->get();
        return view('competitor.index',['competitors'=>$competitors]);
    }
    public function getCompetitorDetails($id){
        $mandi = Competitor::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }
    public function postIndex(Request $request){
        $users_id = \Auth::user()->id;
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'buyer_name' =>'required||unique:competitors,buyer_name',
                'other_detail' =>'required||unique:competitors,other_detail',
                'short_code' =>'required|unique:competitors,short_code',
                'short_order' =>'required|positive_integer|unique:competitors,short_code'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = Competitor::where(['buyer_name'=>$request->buyer_name,'short_code'=>$request->short_code])->count();
        if($duplicate) return response()->json(['error'=>["Duplicate not allowed"]]);
        $competitor = Competitor::insert(['buyer_name'=>$request->buyer_name,'other_detail'=>$request->other_detail,'short_code'=>$request->short_code,'short_order'=>$request->short_order,'created_by'=>$users_id]);
        return response()->json(['success'=>"success"]);

    }

    public function postUpdate(Request $request,$id){
        $users_id = \Auth::user()->id;
        $duplicate = false;
        $validate= Validator::make(
            $request->all(),
            [   
                'buyer_name' =>'required||unique:competitors,buyer_name,'.$id,
                'other_detail' =>'required||unique:competitors,other_detail,'.$id,
                'short_code' =>'required|unique:competitors,short_code,'.$id,
                'short_order' =>'required|positive_integer|unique:competitors,short_code,'.$id
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $competitor = Competitor::where('id',$id)->update(['buyer_name'=>$request->buyer_name,'other_detail'=>$request->other_detail,'short_code'=>$request->short_code,'short_order'=>$request->short_order,'updated_by'=>$users_id]); 
        return response()->json(['success'=>"success"]);

    }
}
