<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Model\ForFreight;
class ForFreightGetController extends Controller
{
    public function index(){
        $forfreights = ForFreight::get();
       
        
        return view('stud_view_freights',['forfreights'=>$forfreights]);
    }
    public function create()
    {
        //
    }
    public function show($id){
        $forfreights = ForFreight::where('id',$id)->with('mandis')->with('destinations')->with('forlineitems')->first();
        return response()->json(['data'=>$forfreights]); 
    }

    public function store(Request $request){
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
        $forfreights->valid_from = $request->valid_from;
        $forfreights->valid_to = $request->valid_to;
        $forfreights->save();
        //dd($forfreights);
        return response()->json(['success'=>'success']);
        
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request,$id){
        //print_r($request->all());
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
        $forfreights->valid_from = $request->valid_from;
        $forfreights->valid_to = $request->valid_to;
        $forfreights->save();
        return response()->json(['success'=>'success']); 
        
    }

    public function destroy($id)
    {
        //
    }
}
