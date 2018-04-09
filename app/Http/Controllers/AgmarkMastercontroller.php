<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Model\AgmarkMaster;

class AgmarkMastercontroller extends Controller
{
    public function index(){
        $agmarkmaster = AgmarkMaster::paginate(20);
       
        
        return view('stud_view_agmarkmaster',['agmarkmasters'=>$agmarkmaster]);
    }
    public function create()
    {
        //
    }
    public function show($id){
        $agmarkmasters = AgmarkMaster::where('id',$id)->first();
        return response()->json(['data'=>$agmarkmasters]); 
    }

    public function store(Request $request){
       // print_r($request->all());
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
        $agmarkmasters->created_by = \Auth::user()->id;
        $agmarkmasters->save();
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
            'location_id' => 'required',
            'market_name' =>'required',
            'active' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $duplicate = AgmarkMaster::where('location_id',$request->location_id)
                            ->where('market_name',$request->market_name)
                            ->whereNotIn('id',[$id])
                            ->count();
        if($duplicate) return response()->json(['error'=>['Duplicate is not allowed']]);
        $agmarkmasters = AgmarkMaster::find($id);
        $agmarkmasters->location_id =$request->location_id;
        $agmarkmasters->market_name = $request->market_name;
        $agmarkmasters->active = $request->active;
        $agmarkmasters->updated_by = \Auth::user()->id;
        $agmarkmasters->save();
        return response()->json(['success'=>'success']); 
        
    }

    public function destroy($id)
    {
        //
    }
}
