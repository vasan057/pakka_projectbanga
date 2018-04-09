<?php

namespace App\Http\Controllers;


use Validator;
use App\Http\Requests;
use App\Model\ForLineItem;
use Illuminate\Http\Request;

class ForLineController extends Controller
{
    public function getIndex(Request $request){

        $forlines = ForLineItem::orderBy('id','desc')->get();
        return view('forline.index',['forlines'=>$forlines]);
    }
    public function getForLineDetails($id){
        $mandi = ForLineItem::where('id',$id)->first();
        return response()->json(['success'=>$mandi]);
    }
    public function postIndex(Request $request){
        $duplicate = false;
        $validate = Validator::make($request->all(),[
            'parameter' => 'required',
            'group' => 'required',
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
        $forlineitems->created_by = \Auth::user()->id;
        $forlineitems->save();
        //dd($forfreights);
        return response()->json(['success'=>'success']);

    }

    public function postUpdate(Request $request,$id){
       $duplicate = false;
        $validate = Validator::make($request->all(),[
            'parameter' => 'required',
            'group' => 'required',
            'data_type' =>'required',
            'sequence' => 'required|positive_integer|unique:for_line_items,sequence,'.$id,
           // 'base' => 'required',
            'value' => 'required|positive_number',
            'valid_from' => 'required|before:valid_to',
            'valid_to' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $forlineitems = ForLineItem::find($id);
        $forlineitems->parameter =$request->parameter;
        $forlineitems->group = $request->group;
        $forlineitems->data_type = $request->data_type;
        $forlineitems->sequence = $request->sequence;
        $forlineitems->base = $request->base;
        $forlineitems->value = $request->value;
        $forlineitems->valid_from = $request->valid_from;
        $forlineitems->valid_to = $request->valid_to;
        $forlineitems->updated_by = \Auth::user()->id;
        $forlineitems->save();
        //dd($forfreights);
        return response()->json(['success'=>'success']);

    }
}
