<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Model\ForLineItem;
class ForLineItemcontroller extends Controller
{
    public function index(){
        $forlineitems = ForLineItem::paginate(20);
        return view('stud_view_forlineitems',['forlineitems'=>$forlineitems]);
    }
    public function create()
    {
        //
    }
    public function show($id){
        $forlineitems = ForLineItem::where('id',$id)->first();
        return response()->json(['data'=>$forlineitems]); 
    }

    public function store(Request $request){
        $duplicate = false;
        $validate = Validator::make($request->all(),[
            'parameter' => 'required|alpha_num_space_underscore',
            'group' => 'required|alpha_num_underscore',
            'data_type' =>'required',
            'sequence' => 'required|positive_integer',
           // 'base' => 'required',
            'value' => 'required|positive_number',
            'valid_from' => 'required|before:valid_to',
            'valid_to' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = ForLineItem::where('group',$request->group)
                            ->where('sequence',$request->sequence)
                            ->count();
        if($duplicate) return response()->json(['error'=>['Duplicate is not allowed']]);
        $forlineitems = new ForLineItem;
        $forlineitems->parameter =$request->parameter;
        $forlineitems->group = $request->group;
        $forlineitems->data_type = $request->data_type;
        $forlineitems->sequence = $request->sequence;
        $forlineitems->base = $request->base;
        $forlineitems->value = $request->value;
        $forlineitems->valid_from = $request->valid_from;
        $forlineitems->valid_to = $request->valid_to;
        $forlineitems->save();
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
            'parameter' => 'required|alpha_num_space_underscore',
            'group' => 'required|alpha_num_underscore',
            'data_type' =>'required',
            'sequence' => 'required|positive_integer',
           // 'base' => 'required',
            'value' => 'required|positive_number',
            'valid_from' => 'required',
            'valid_to' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = ForLineItem::where('group',$request->group)
                            ->where('sequence',$request->sequence)
                            ->whereNotIn('id',[$id])
                            ->count();
        if($duplicate) return response()->json(['error'=>['Duplicate is not allowed']]);
        $forlineitems = ForLineItem::find($id);
        $forlineitems->parameter =$request->parameter;
        $forlineitems->group = $request->group;
        $forlineitems->data_type = $request->data_type;
        $forlineitems->sequence = $request->sequence;
        $forlineitems->base = $request->base;
        $forlineitems->value = $request->value;
        $forlineitems->valid_from = $request->valid_from;
        $forlineitems->valid_to = $request->valid_to;
        $forlineitems->save();
        return response()->json(['success'=>'success']); 
        
    }

    public function destroy($id)
    {
        //
    }
}
