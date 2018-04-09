<?php

namespace App\Http\Controllers;  
use Illuminate\Http\Request; 
use DB; 
use App\Http\Requests; 
use App\Http\Controllers\Controller;  
class StudUpdateController extends Controller 
{ 
    public function index(){ 
  $mandi_name = DB::select('select * from mandis'); 
  return view('stud_edit_view',['mandi_name'=>$mandi_name]); 
 } 
  
 public function show($id) 
    { 
        $mandi_name = DB::select('select * from mandis where id = ?',[$id]); 
  return view('stud_update',['mandi_name'=>$mandi_name]); 
    } 
  
 public function edit(Request $request,$id) 
    { 
  $mandi_name = $request->input('stud_name'); 
  DB::update('update mandis set mandi_name = ? where id = ?',[$mandi_name,$id]); 
  //echo "ajksjd:".$mandi_name;
  echo "Record updated successfully.<br/>"; 
 // echo '<a href="/lsapp/public/edit-records">Click Here</a> to go back.'; 
  echo '<a href="/lsapp/public/view-records">Click Here</a> to go back.'; 
    } 
} 
