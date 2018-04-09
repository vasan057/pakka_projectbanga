<?php  
namespace App\Http\Controllers;  
use Illuminate\Http\Request; 
use DB; 
use App\Http\Requests; 
use App\Http\Controllers\Controller;  
class StudInsertController extends Controller 
{ 
    public function insertform(){ 
  return view('stud_create'); 
} 
  
public function insert(Request $request){ 
 $mandi_name = $request->input('stud_name'); 
 DB::insert('insert into mandis (mandi_name) values(?)',[$mandi_name]); 
 echo "Record inserted successfully.<br/>"; 
 echo '<a href="/lsapp/public/insert">Click Here</a> to go back.'; 
} 
} 
