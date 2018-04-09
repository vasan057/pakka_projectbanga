<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MandiDailyPrice;
use App\Model\UserMandiMapping;
use App\Model\Mandi;
use App\Http\Requests;
use Validator;
use Excel;
use Auth;

class MandiDailyPriceController extends Controller
{

    public function __construct(){
        $this->middleware(['role:admin|facilitator|pakka|ubp'])->only(['index','store','show','postExcelUpload']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $from = $request->input('from',date('Y-m-d'));
        $to = $request->input('to',date('Y-m-d'));
        if($user->roles_id == '4'){
            $mandi_prices = MandiDailyPrice::whereBetween('date',[$from,$to])
                        ->get();
        }else{
            $user_mandi_map = UserMandiMapping::where('user_id',$user->id)->pluck('mandi_id');
            $mandi_prices = MandiDailyPrice::whereBetween('date',[$from,$to])
                        ->whereIn('mandi_id',$user_mandi_map)
                        ->get();
        }
        
        $ceilings_count = count($mandi_prices);
        $notify_count = 0;
        $notified = 'no';
        foreach($mandi_prices as $ceiling){
            if(isset($ceiling->ceiling->notified_time) && $ceiling->ceiling->notified_time) ++$notify_count;
        }
        if($notify_count > 0) $notified = 'yes';
        $view = "";
        if(in_array($user->roles_id,[2,3,4])){
            $view = "_".$user->role_view;
        }
        return view('mandi_daily_price.index'.$view,['mandi_prices'=>$mandi_prices,'notified'=>$notified]);
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
        $user = Auth::user();
        $user_id = $user->id;
        $validate= Validator::make(
            $request->all(),
            [   
                'mandi' =>'required',
                'min_price' => 'required|natural_number',
                'max_price' => 'required|natural_number|greater_than_equal:min_price',
                'quantity' => 'positive_number'
            ]
        );
        $date = date('Y-m-d');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $mandi_price = MandiDailyPrice::firstOrNew(['mandi_id'=>$request->mandi,'date'=>$date]);
            $mandi_price->save_min =  $request->min_price; 
            $mandi_price->save_max = $request->max_price;
            $mandi_price->save_qty = $request->quantity;
            $mandi_price->min = $request->min_price;
            $mandi_price->max =  $request->max_price;
            $mandi_price->quantity = $request->quantity?$request->quantity:0;
            $mandi_price->created_by = $user_id;
            $mandi_price->updated_by = $user_id;
            if($mandi_price->isSubmit) $mandi_price->status = 'old';
            $mandi_price->isSubmit = 0;
            $mandi_price->isFrozen = $mandi_price->isFrozen ? $mandi_price->isFrozen : false;
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
        $price = MandiDailyPrice::where('id',$id)->with('mandi')->first();
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
        $user = Auth::user();
        $user_id = $user->id;
        $validate= Validator::make(
            $request->all(),
            [
            'min_price' => 'required|natural_number',
            'max_price' => 'required|natural_number|greater_than_equal:min_price',
            'quantity' => 'positive_number'
            ]
        );
        $date = date('Y-m-d');
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
            $mandi_price = MandiDailyPrice::find($id);
            $mandi_price->save_min =  $request->min_price; 
            $mandi_price->save_max = $request->max_price;
            $mandi_price->save_qty = $request->quantity;
            $mandi_price->min = $request->min_price;
            $mandi_price->max =  $request->max_price;
            $mandi_price->quantity = $request->quantity?$request->quantity:0;
            $mandi_price->updated_by = $user_id;
            if($mandi_price->isSubmit) $mandi_price->status = 'old';
            $mandi_price->isSubmit = 0;
            $mandi_price->isFrozen = $mandi_price->isFrozen ? $mandi_price->isFrozen : false;
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
        $user = Auth::user();
        $user_id = $user->id;
        $validate= Validator::make(
            [
                'file'      => $request->file,
                'extension' => $request->file ? strtolower($request->file->getClientOriginalExtension()):'',
            ], 
            [
                'file'          => 'required',
                'extension'      => 'in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp',
            ],
            [
                'extension.in' => 'Uploaded file format is not correct.'
            ]
        );
        if($validate->fails()) return back()->withErrors($validate);
        $datas = Excel::load($request->file,function($reader){

        })->get();
        $mandi = \App\Model\UserMandiMapping::where(['user_id'=>$user_id,'active'=>1])->with('mandi')->get()->pluck('mandi.id','mandi.short_name');
        //    dd($datas);
        $all_data = [];
        $fail_data = [];
        $fail_price  =[];
        $fail_date  =[];
        $price_null = [];
        if(count($datas)){
            foreach($datas as $key=>$data){
                if(!is_numeric($data->mandi_name) && isset($mandi[$data->mandi_name])){
                    if((float) $data->min_price < 1 || (float) $data->max_price < 1 ){
                        $price_null[] = $key+1;
                    }else if((float) $data->min_price <= (float) $data->max_price){
                        $date = date('Y-m-d',strtotime($data->date));
                        if($date != date('Y-m-d'))  $fail_date[] = $key+1;
                        $all_data[] = [
                            'mandi_id' => $mandi[$data->mandi_name],
                            'save_min' => (float) $data->min_price,
                            'save_max' => (float) $data->max_price,
                            'quantity' => (float) $data->quantity,
                            'date' => $date,
                        ];
                        }else{
                            $fail_price[] = $key+1;
                        }
                }else{
                    $fail_data[] = $data->mandi_name;
                }
            }
        }
        
        $fail_data = array_filter($fail_data);
        $fail_price = array_filter($fail_price);
        $fail_date = array_filter($fail_date);
        $price_null = array_filter($price_null);
        $incre = 0;
        if(!empty($all_data) && empty($fail_data) && empty($fail_price) && empty($price_null) && empty($fail_date)){
            foreach($all_data as $insert){
                $mandi_price = MandiDailyPrice::firstOrNew(['mandi_id'=>$insert['mandi_id'],'date'=>$insert['date']]);
                $mandi_price->save_min =  $insert['save_min']; 
                $mandi_price->save_max =$insert['save_max'];
                $mandi_price->save_qty = $insert['quantity'];
                $mandi_price->min = $insert['save_min'];
                $mandi_price->max = $insert['save_max'];
                $mandi_price->quantity = $insert['quantity'];
                $mandi_price->created_by = $user_id;
                $mandi_price->updated_by = $user_id;
                $mandi_price->status = $mandi_price->isSubmit?'old':' ';
                $mandi_price->isSubmit = 0;
                $mandi_price->isFrozen = $mandi_price->isFrozen ? $mandi_price->isFrozen : false;
                $mandi_price->save();
            }
        }
        $fail = !empty($fail_data) ? (++$incre).'. '.implode(', ',$fail_data).' mandi(s) not available. <br>':'';
        if(count($fail_price)) $fail .= (++$incre).". MIN price should always be less than or equal to MAX price on row(s) ".implode(',',$fail_price).'<br>';
        if(count($price_null))  $fail .= (++$incre).". MIN and MAX price can not be zero or null on row(s) ".implode(',',$price_null).'<br>';
        if(count($fail_date))  $fail .= (++$incre).". The date should be today date row(s) ".implode(',',$fail_date).'<br>';
        if(count($fail_data) || count($fail_price) || count($price_null) || count($fail_date)) return back()->with('error',$fail);
        return back()->with('message',"Successfully imported");
    }
    
    public function getUpdateSubmit(){
        MandiDailyPrice::where('date',date('Y-m-d'))->update(['isSubmit'=>1]);
        $msg = "Successfully updated prices.";
        return response()->json(['success'=>$msg]);
    }

    public function getSubmit($id){
        $m_price = MandiDailyPrice::where(['date'=>date('Y-m-d'),'id'=>$id])->first();
        if(!$m_price) return back()->with('error','This record not able to submit');
        $m_price->isSubmit = 1;
        $m_price->save();
        return back()->with('status','Submitted successfully');

    }
}
