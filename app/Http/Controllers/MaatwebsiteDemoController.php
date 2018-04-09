<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
//use Input;
use Illuminate\Support\Facades\Input;
use App\agmarknet;
use DB;
use Excel;
class MaatwebsiteDemoController extends Controller
{
	public function importExport()
	{
		return view('import_agmarkmaster');
	}
	public function downloadExcel($type)
	{
		$data = agmarknet::get()->toArray();
		/* return Excel::create('agmarknet', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type); */
	}
	public function importExcel()  //For agmarknet
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['mandi_id' => $value->mandi_id, 'state_name' => $value->state_name, 'district_name' => $value->district_name, 'market_center_name' => $value->market_center_name, 'variety' => $value->variety, 'group_name' => $value->group_name, 'arrival' => $value->arrival, 'ag_min' => $value->ag_min, 'ag_max' => $value->ag_max, 'modal' => $value->modal, 'date_arrival' => $value->date_arrival];
				}
				if(!empty($insert)){
					$users = DB::table('agmarknet')->insert($insert);
					//dd('Insert Record successfully.');
					//dd(json_encode($users));
					return Redirect::to('import_agmarkmaster')->with('message','Insert Record successfully !!!');
				}
			}
		}
		return back();
	}

	public function importExport_arrival() //For Mandi daily price
	{
		return view('import_arrival');
	}
	public function importExcel_arrival()  //For Mandi daily price
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['mandi_id' => $value->mandi_id, 'save_min' => $value->save_min, 'save_max' => $value->save_max, 'save_qty' => $value->save_qty, 'min' => $value->min, 'max' => $value->max, 'quality' => $value->quality];
				}
				if(!empty($insert)){
					$users = DB::table('mandi_daily_price')->insert($insert);
					//dd('Insert Record successfully.');
					//dd(json_encode($users));
					return Redirect::to('import_arrival')->with('message','Insert Record successfully !!!');
				}
			}
		}
		return back();
	}
}