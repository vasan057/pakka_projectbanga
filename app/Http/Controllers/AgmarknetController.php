<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mandi;
use App\Model\AgmarkMaster;
use App\Model\Agmarknet;
use App\Model\Location;
use App\Http\Requests;
use Validator;
use Excel;
class AgmarknetController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from = $request->input('from',date('Y-m-d'));
        $to = $request->input('to',date('Y-m-d'));
        $from = date('Y-m-d 00:00:00',strtotime($from));
        $to = date('Y-m-d 23:59:59',strtotime($to));
        $agmarknets = Agmarknet::whereBetween('date_arrival',[$from,$to])->whereNull('is_old')->paginate(20);
        return view('agmarknet.index',['agmarknets'=>$agmarknets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate= Validator::make(
            $request->all(),
            ['mandi_id' =>'required',
            'district_name' => 'required',
            'market_center_name' => 'required',
            'commodity' => 'required',
            'variety' => 'required',
            'grade' => 'required',
            'ag_min' => 'required|numeric',
            'ag_max' => 'required|numeric',
            'modal' => 'required|numeric',
            'date_arrival' => 'required'
            ]
        );
        $date = date('Y-m-d');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $mandi_price = Agmarknet::first(['mandi_id'=>$request->mandi,'date_arrival'=>$date]);
            if($mandi_price){
                $mandi_price->is_old = 1;
                $mandi_price->save();
            } 
            $mandi_price = new Agmarknet;
            $mandi_price->state_name =  $request->state_name; 
            $mandi_price->district_name = $request->district_name;
            $mandi_price->market_center_name = $request->market_center_name;
            $mandi_price->commodity = $request->commodity;
            $mandi_price->variety = $request->variety;
            $mandi_price->grade =  $request->grade;
            $mandi_price->ag_min = $request->ag_min;
            $mandi_price->ag_max = $request->ag_max;
            $mandi_price->modal = $request->modal;
            $mandi_price->created_by = \Auth::user()->id;
            $mandi_price->save();
            
           
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = Agmarknet::where('id',$id)->whereNull('is_old')->with('mandi')->first();
        return response()->json(['success'=>$price]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate= Validator::make(
            $request->all(),
            ['mandi_id' =>'required',
            'district_name' => 'required',
            'market_center_name' => 'required',
            'commodity' => 'required',
            'variety' => 'required',
            'grade' => 'required',
            'ag_min' => 'required|numeric',
            'ag_max' => 'required|numeric',
            'modal' => 'required|numeric',
            'date_arrival' => 'required'
            ]
        );
        $date = date('Y-m-d');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $mandi_price = Agmarknet::find($id);
            $mandi_price->state_name =  $request->state_name; 
            $mandi_price->district_name = $request->district_name;
            $mandi_price->market_center_name = $request->market_center_name;
            $mandi_price->commodity = $request->commodity;
            $mandi_price->variety = $request->variety;
            $mandi_price->grade =  $request->grade;
            $mandi_price->ag_min = $request->ag_min;
            $mandi_price->ag_max = $request->ag_max;
            $mandi_price->modal = $request->modal;
            $mandi_price->updated_by = \Auth::user()->id;;
            $mandi_price->save();
            
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postExcelUpload(Request $request){
        //dd($request->all());
        $validate= Validator::make(
            [
                'file'      => $request->file,
                'extension' => $request->file ? strtolower($request->file->getClientOriginalExtension()):'',
            ], 
            [
                'file'          => 'required',
                'extension'      => 'in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp',
            ]
        );
        if($validate->fails()) return back()->withErrors($validate);
        $datas = Excel::load($request->file,function($reader){
            $reader->setHeaderRow(2);
        })->get();
          
        $agmarkmaster = AgmarkMaster::where('active','1')->pluck('id','market_name');
        // echo "<pre>";print_r($datas);exit;   
        //$agmarknets=Agmarknet::where('id',$id)->find(1)
        $all_data = [];
        $fail_data = [];
        $err='';
        $fail = false;
        if(count($datas)){
            foreach($datas as $key=>$data){
                if(!$data->market_name || !$data->district_name || !$data->grade || !$data['min_price_rs.quintal'] || !$data['max_price_rs.quintal'] || !$data->price_date){
                    $err .= "Please fill or delete incomplete cells";
                    $fail = true;
                }else{
                    $state = Location::where('District',$data->district_name)->first();
                   
                    if($state){
                        
                        if(isset($agmarkmaster[$data->market_name])){
                            $ag_master=AgmarkMaster::where(['market_name'=>$data->market_name,'location_id'=>$state->id])->first();
                            if($ag_master){
                                \Log::info(json_encode($ag_master));
                                $all_data[] = [
                                    'sno' => $data['sl_no.'],
                                    'market_name' => $data->market_name,
                                    'agmark_master_id' => $ag_master->id,
                                    'district_name' => $data->district_name,
                                    'state_name' => $state->State,
                                    'market_center_name' => $data->market_name,
                                    'commodity' => $data->commodity,
                                    'variety' => $data->variety,
                                    'grade' => $data->grade,
                                    'ag_min' => (float) $data['min_price_rs.quintal'],
                                    'ag_max' => (float) $data['max_price_rs.quintal'],
                                    'modal' => $data['modal_price_rs.quintal'],
                                    'date_arrival' =>$data->price_date,
                                ];
                            }else{
                                $err .= $data->market_name." and ".$data->district_name." combination is not matching.<br>";
                                $fail = true;
                            }
                        } 
                        else{
                            $err .= $data->market_name." Name is not present in Agmark Master.<br>";
                            $fail = true;
                        } 
                    }else{
                        $err .= $data->district_name." Name is not present in Location Master<br>";
                        $fail = true;
                    }
                }
            }
        }
       if($fail) return back()->with('error',$err);
        if(!empty($all_data) && $fail==false){
            foreach($all_data as $insert){
                    $mandi_prices = Agmarknet::where(['agmark_master_id'=>$insert['agmark_master_id'],'date_arrival'=>$insert['date_arrival']])->whereNull('is_old')->get();
                    if(count($mandi_prices)){
                        foreach($mandi_prices as $mandi_price){
                            $mandi_price->is_old = true;
                            $mandi_price->save();
                        }
                    } 
                    $new_mandi_price = new Agmarknet;
                    $new_mandi_price->district_name =$insert['district_name'];
                    $new_mandi_price->agmark_master_id =$insert['agmark_master_id'];
                    $new_mandi_price->state_name =$insert['state_name'];
                    $new_mandi_price->market_center_name = $insert['market_center_name'];
                    $new_mandi_price->commodity = $insert['commodity'];
                    $new_mandi_price->variety = $insert['variety'];
                    $new_mandi_price->grade = $insert['grade'];
                    $new_mandi_price->ag_min = $insert['ag_min'];
                    $new_mandi_price->ag_max = $insert['ag_max'];
                    $new_mandi_price->modal = $insert['modal'];
                    $new_mandi_price->date_arrival = $insert['date_arrival'];
                    $new_mandi_price->save();
            } 
        }
       
       
        return back()->with('message','Successfully inserted');
    }

    /* public function getUpdateSubmit(){
        Agmarknet::where('date',date('Y-m-d'))->update(['isSubmit'=>1]);
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    } */
}
