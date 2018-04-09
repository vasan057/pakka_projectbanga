<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Http\Requests;
use App\Model\Mandi;
use App\Http\Controllers\Controller;
use App\Model\MandiDestinationMapping;
use App\Model\MandiCeilingPriceDaily;

class for_update extends Controller
{
	public function updateMandi(request $request){
        $id= $request->id;
        $duplicate = false;
        $column=$request->column;
        $changed_val=$request->changed_val;
        $table=$request->table;
        // check if mandi name is already exists
        if($column == 'short_name') $duplicate = Mandi::whereNotIn('id',[$id])->where('short_name',$changed_val)->count();
        if($duplicate) return response()->json(['error'=>'Duplicate is not allowed']);
        DB::enableQueryLog();
        DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
        \Log::info(json_encode(DB::getQueryLog()));
        return response()->json(['success'=>'updated successfully']);
     
     }
     public function index(request $request){
        $id= $request->id;
        $column=$request->column;
        $changed_val=$request->changed_val;
        $table=$request->table;
        if($table=="users_basic" && $column=="user_id")
        {
            $cnt_user_update = DB::select('select count(user_id) as count from users_basic where user_id = "'.$changed_val.'"');
            foreach ($cnt_user_update as $user)
            {
                $count= $user->count ;
                break;
            }

            if($count>0)
            {
                return "false";
            }
            else
            {
                DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
                return "true"; 
                //return "Record Created sucessfully"; 
            }

        }
        else if($table=="roles" && $column=="role")
        {
            $cnt_user_update = DB::select('select count(role) as count from roles where role = "'.$changed_val.'"');
            
            foreach ($cnt_user_update as $user)
            {
                $count= $user->count ;
                break;
            }

            if($count>0)
            {
                return "false";
            }
            else
            {
                DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
                return "true"; 
                //return "Record Created sucessfully"; 
            }

        }
        else if($table=="competitors" && $column=="buyer_name")
        {
            $cnt_competitors_update = DB::select('select count(buyer_name) as count from competitors where buyer_name = "'.$changed_val.'"');
            
            foreach ($cnt_competitors_update as $user)
            {
                $count= $user->count ;
                break;
            }

            if($count>0)
            {
                return "false";
            }
            else
            {
                DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
                return "true"; 
                //return "Record Created sucessfully"; 
            }

        }
        else if($table=="states" && $column=="state_name")
        {
            $cnt_state_update = DB::select('select count(state_name) as count from states where state_name = "'.$changed_val.'"');
            
            foreach ($cnt_state_update as $user)
            {
                $count= $user->count ;
                break;
            }

            if($count>0)
            {
                return "false";
            }
            else
            {
                DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
                return "true"; 
                //return "Record Created sucessfully"; 
            }

        }

        else if($table=="mandidestinationmapping" && $column=="destination_id")
        {
            $get_id = DB::select('select * from mandidestinationmapping where id = "'.$id.'"');
//            $cnt_state_update = DB::select('select count(state_name) as count from states where state_name = "'.$changed_val.'"');
            
            foreach ($get_id as $get_id_rec)
            {
                $destination_id= $get_id_rec->destination_id;
                $mandi_id= $get_id_rec->mandi_id;
                break;
            }
            $count = MandiDestinationMapping::where('destination_id',$changed_val)->where('mandi_id',$mandi_id)->count();
            // $cnt_state_update = DB::select('select count(*) as count from mandidestinationmapping
            //  where destination_id = "'.$changed_val.'" and mandi_id="'.$mandi_id.'"');
            // foreach ($cnt_state_update as $user)
            // {
            //     $count= $user->count ;
            //     break;
            // }
            if($count>0)
            {
                //return "false";
                return response()->json(['error'=>['Duplicate Record Found']]);
            }
            else
            {
                // DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
                DB::table($table)->where('id',$id)->update([$column=>$changed_val]);
                // return "true";
                return response()->json(['success'=>'success']);
                //return "Record Created sucessfully"; 
            }

        }
        else if($table=="mandidestinationmapping" && $column=="mandi_id")
        {
            $get_id = DB::select('select * from mandidestinationmapping where id = "'.$id.'"');
//            $cnt_state_update = DB::select('select count(state_name) as count from states where state_name = "'.$changed_val.'"');
            
            foreach ($get_id as $get_id_rec)
            {
                $destination_id= $get_id_rec->destination_id;
                $mandi_id= $get_id_rec->mandi_id;
                break;
            }
            $count = MandiDestinationMapping::where('mandi_id',$changed_val)->where('destination_id',$destination_id)->count();
            // $cnt_state_update = DB::select('select count(*) as count from mandidestinationmapping
            //  where destination_id = "'.$changed_val.'" and mandi_id="'.$mandi_id.'"');
            // foreach ($cnt_state_update as $user)
            // {
            //     $count= $user->count ;
            //     break;
            // }
            if($count>0)
            {
                //return "false";
                return response()->json(['error'=>['Duplicate Record Found']]);
            }
            else
            {
                // DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
                DB::table($table)->where('id',$id)->update([$column=>$changed_val]);
                // return "true";
                return response()->json(['success'=>'success']);
                //return "Record Created sucessfully"; 
            }

        }
        else
        {
            DB::update('update '.$table.' set '.$column.' = ? where id = ?',[$changed_val,$id]); 
            return "true";
        }    
     }
     public function index_insert(Request $request){
        $mandi_name= $request->mandi_name;
        $agmark_market_id=$request->agmark_market_id;
        $location_id=$request->location_id;
        $short_name=$request->short_name;
        $address_1=$request->address_1;
        $address_2=$request->address_2;
        $pincode=$request->pincode;
        $city=$request->city;
        $district=$request->district;
        $state=$request->state;
        $user_id=$request->user_id;
        DB::insert('insert into mandis (mandi_name, agmark_market_id, location_id, short_name, address_1, address_2, pincode, city, district, state, user_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$mandi_name, $agmark_market_id, $location_id, $short_name, $address_1, $address_2, $pincode, $city, $district, $state, $user_id]);
        /* DB::table('mandis')->insert([
            ['mandi_name' => $mandi_name, 'votes' => 0],
            ['agmark_market_id' => $agmark_market_id, 'votes' => 0],
            ['address_1' => $address_1, 'votes' => 0],
            ['address_2' => $address_2, 'votes' => 0],
            ['pincode' => $pincode, 'votes' => 0]
        ]); */
        //DB::update('update mandis set '.$column.' = ? where id = ?',[$changed_val,$id]); 
        return "1:".$mandi_name.",2:".$agmark_market_id.",3:".$address_1.",4:".$address_2.",5:".$pincode."."; 
     
     }
     
     public function user_insert(request $request){
        $user_id= $request->user_id;
        $password=$request->password;
        $mobile_1=$request->mobile_1;
        $mobile_2=$request->mobile_2;
        $address_1=$request->address_1;
        $address_2=$request->address_2;
        $pincode=$request->pincode;
        $gstin=$request->gstin;
        $roles_id=$request->roles_id;
        $email_1=$request->email_1;
        $email_2=$request->email_2;
        $active=$request->active; 
        $cnt = DB::select('select count(user_id) as count from users_basic where user_id = "'.$user_id.'"');
        foreach ($cnt as $user)
        {
            $count= $user->count ;
            break;
        }

        if($count>0)
        {
            return "false";
        }
        else
        {
            DB::insert('insert into users_basic (user_id, password, mobile_1, mobile_2, address_1, address_2, pincode, gstin, roles_id, email_1, email_2, active) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$user_id, $password, $mobile_1, $mobile_2, $address_1, $address_2, $pincode, $gstin, $roles_id, $email_1, $email_2, $active]);
            return "true"; 
//            return "Record Created sucessfully"; 
        }
        
        // $cnt = DB::select('select count(user_id) from users_basic');
      // $jsonArray = json_decode(array($cnt),true);
        //$array= response()->json(array('count'=> $cnt), 200);
        //$jsonArray = json_decode(array($array),true);
        // $key = "count";

        //$firstName = $jsonArray[$key];
      // return  $firstName;
       //return response()->json(array($cnt), 200);
       //return response()->json(array('count'=> $cnt), 200);
        //dd(DB::getQueryLog());
        //if($cnt)
        //{
            //dd($cnt);
           //return Redirect::to('view-users')->with('message','Record Already exist !!!');
       
            /*  }
        else
        {
            DB::insert('insert into users_basic (user_id, password, mobile_1, mobile_2, address_1, address_2, pincode, gstin, roles_id, email_1, email_2, active) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$user_id, $password, $mobile_1, $mobile_2, $address_1, $address_2, $pincode, $gstin, $roles_id, $email_1, $email_2, $active]);
            return "1:".$roles_id.",2:".$email_1.",3:".$email_2.",4:".$pincode.",5:".$address_2."."; 
        }  */   
            /* DB::table('mandis')->insert([
            ['mandi_name' => $mandi_name, 'votes' => 0],
            ['agmark_market_id' => $agmark_market_id, 'votes' => 0],
            ['address_1' => $address_1, 'votes' => 0],
            ['address_2' => $address_2, 'votes' => 0],
            ['pincode' => $pincode, 'votes' => 0]
        ]); */
        //DB::update('update mandis set '.$column.' = ? where id = ?',[$changed_val,$id]); 
       
       //return true;
     }
     public function role_insert(request $request){
       
        $role=$request->role;
        $active=$request->active;
        
        $cnt = DB::select('select count(role) as count from roles where role = "'.$role.'"');
        foreach ($cnt as $user)
        {
            $count= $user->count ;
            break;
        }

        if($count>0)
        {
            return "false";
        }
        else
        {
            DB::insert('insert into roles (role, active) values (?, ?)', [$role, $active]);
            return "true"; 
//            return "Record Created sucessfully"; 
        }
       
        return "Update".$role."hi".$active."hi"; 
     
     }
     public function location_insert(request $request){
       
        $State=$request->State;
        $District=$request->District;
        $Town_City=$request->Town_City;
        $MarketName=$request->MarketName;
        
        DB::insert('insert into locations (State, District, Town_City, MarketName) values (?, ?, ?, ?)', [$State, $District, $Town_City, $MarketName]);
        return "Update".$State."hi".$Town_City."hi"; 
     
     }
     public function state_insert(request $request){
        $validate= \Validator::make(
            $request->all(),
            [   
                'state_name' =>'required|unique:states,state_name',
                'sort_order' =>'required|unique:states,sort_order',
                'short_name' =>'required|unique:states,short_name',
                'status' =>'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
       $user_id = \Auth::user()->id;
        $state_name=$request->state_name;
        $sort_order=$request->sort_order;
        $short_name=$request->short_name;
        $status=$request->status;
        $cnt = DB::select('select count(state_name) as count from states where state_name = \''.$state_name.'\'');
        foreach ($cnt as $user)
        {
            $count= $user->count ;
            break;
        }

        if($count>0)
        {
            return "false";
        }
        else
        {
            $state = new \App\Model\State;
            $state->state_name = $state_name;
            $state->sort_order = $sort_order;
            $state->short_name = $short_name;
            $state->status = $status;
            $state->created_by = $user_id;
            $state->save();
            return "true";
//            return "Record Created sucessfully"; 
        }
        
        return "Update".$status."hi"; 
     
     }
     public function freight_insert(request $request){
       
        $from_mandi=$request->from_mandi;
        $to_warehouse=$request->to_warehouse;
        $freight=$request->freight;
       DB::insert('insert into for_freight (from_mandi, to_warehouse, freight) values (?, ?, ?)', [$from_mandi, $to_warehouse, $freight]);
        return "Update".$from_mandi."hi".$to_warehouse."hi"; 
     }
     public function lineitem_insert(request $request){
       
        $parameter=$request->parameter;
        $data_type=$request->data_type;
        $value=$request->value;
        $valid_from=$request->valid_from;
        $valid_to=$request->valid_to;
       DB::insert('insert into for_line_items (parameter, data_type , value, valid_from, valid_to) values (?, ?, ?, ?, ?)', [$parameter, $data_type , $value, $valid_from, $valid_to]);
        return "Update".$parameter."hi".$data_type."hi"; 
     }
     public function destination_insert(request $request){
       
        $delivery_type=$request->delivery_type;
        $delivery_name=$request->delivery_name;
        $short_name=$request->short_name;
        $address_1=$request->address_1;
        $address_2=$request->address_2  ;
        $pincode=$request->pincode;
        $city=$request->city;
        $district=$request->district;
        $state=$request->state;
        $mobile_1=$request->mobile_1;
        $mobile_2=$request->mobile_2;
        $email_1=$request->email_1;
        $email_2=$request->email_2;
        $gstin=$request->gstin;
       DB::insert('insert into destinations (delivery_type, delivery_name, short_name, address_1, address_2, pincode, city, district, state, mobile_1, mobile_2, email_1, email_2, gstin) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$delivery_type, $delivery_name, $short_name, $address_1, $address_2, $pincode, $city, $district, $state, $mobile_1, $mobile_2, $email_1, $email_2, $gstin]);
        return "Update".$mobile_1."hi".$delivery_name."hi"; 
     }
     public function competitor_insert(request $request){
       
        $buyer_name=$request->buyer_name;
        $other_detail=$request->other_detail;
        $short_code=$request->short_code;
        $short_order=$request->short_order;
       
        
        $cnt = DB::select('select count(buyer_name) as count from competitors where buyer_name = "'.$buyer_name.'"');
        foreach ($cnt as $user)
        {
            $count= $user->count ;
            break;
        }

        if($count>0)
        {
            return "false";
        }
        else
        {
            DB::insert('insert into competitors (buyer_name, other_detail, short_code, short_order) values (?, ?, ?, ?)', [$buyer_name, $other_detail, $short_code, $short_order]);
            return "true"; 
//            return "Record Created sucessfully"; 
        }
       
        return "Update".$short_code."hi".$buyer_name."hi"; 
     }
       public function getuserdrop(){
        $users = DB::select('select id,user_id from users_basic'); 
        
        return json_encode($users);
     
     }  

      public function getmandiagmarkdrop(){
        $users = DB::select('select id,market_name from agmark_master'); 
        
        return json_encode($users);
     
     }   
     public function getmandilocationdrop(){
        $users = DB::select('select id,State,Town_City,District from locations '); 
        
        return json_encode($users);
     
     }  
     public function getmandicitydrop(){
        $users = DB::select('select id,Town_City from locations'); 
        
        return json_encode($users);
     
     }   
     public function getmandidistrictdrop(){
        $users = DB::select('select id,District from locations'); 
        
        return json_encode($users);
     
     } 
     public function getmandistatedrop(){
        $users = DB::select('select id,state_name from states'); 
        
        return json_encode($users);
     
     }   
     public function getuserroledrop(){
        $users = DB::select('select id,role from roles'); 
        
        return json_encode($users);
     
     }   

     public function getmandidrop(){
        $users = DB::select('select id,short_name from mandis'); 
        
        return json_encode($users);
     
     } 
     public function getdestinationdrop(){
        $users = DB::select('select id,short_name from destinations'); 
        
        return json_encode($users);
     
     } 
     public function agmark_insert(request $request){
       
        $location_id=$request->location_id;
        $mandi_id=$request->mandi_id;
        $market_name=$request->market_name;
        $active=$request->active;
        
       
       DB::insert('insert into agmark_master (location_id, mandi_id, market_name, active) values (?, ?, ?, ?)', [$location_id, $mandi_id, $market_name, $active]);
        return "Update".$location_id."hi".$mandi_id."hi"; 
     }
     public function mandiuser_insert(request $request){
       
        $user_id=$request->user_id;
        $mandi_id=$request->mandi_id;
        $active=$request->active;
        
       
       DB::insert('insert into usermandimapping (user_id, mandi_id, active) values (?, ?, ?)', [$user_id, $mandi_id, $active]);
        return "Update".$user_id."hi".$active."hi"; 
     }
     public function mandilocation_insert(request $request){
       
        $location_id=$request->location_id;
        $mandi_id=$request->mandi_id;
        $active=$request->active;
        
       
       DB::insert('insert into mandilocationmapping (location_id, mandi_id, active) values (?, ?, ?)', [$location_id, $mandi_id, $active]);
        return "Update".$location_id."hi".$active."hi"; 
     }
     public function userrole_insert(request $request){
       
        $user_id=$request->user_id;
        $role_id=$request->role_id;
        $active=$request->active;
        
       
       DB::insert('insert into userrolemapping (user_id, role_id, active) values (?, ?, ?)', [$user_id, $role_id, $active]);
        return "Update".$user_id."hi".$active."hi"; 
     }
     public function statelocation_insert(request $request){
       
        $location_id=$request->location_id;
        $state_id=$request->state_id;
        $active=$request->active;
        
       
       DB::insert('insert into statelocationmapping (location_id, state_id, active) values (?, ?, ?)', [$location_id, $state_id, $active]);
        return "Update".$location_id."hi".$active."hi"; 
     }
     public function mandidestination_insert(request $request){
        
        $id = $request->id;
        $rules =   [
                        'destination_id' => 'required',
                        'mandi_id' => 'required',
                    ];
        $message = ['destination_id.required' => "The Destinations field is required",'mandi_id.required' => "The Mandi Name field is required"];
        $validate = \Validator::make($request->all(),$rules,$message);
        if($validate->fails()){
            return response()->json(['error'=>$validate->errors()]);
        }
         $user = \Auth::user();
        $duplicate = false;
        $destination_id=$request->destination_id;
        $mandi_id=$request->mandi_id;
        $active=$request->active;
        $duplicate = MandiDestinationMapping::where('destination_id',$destination_id)->where('mandi_id',$mandi_id)->count();
        if($duplicate) return response()->json(['error'=>'Duplicate not allowed']);                                
        $mapping = new MandiDestinationMapping;
        $mapping->destination_id = $destination_id;
        $mapping->mandi_id = $mandi_id;
        $mapping->active = $active;
        $mapping->created_by = $user->id;
        $mapping->updated_by = $user->id;
        $mapping->save();
         return response()->json(['success'=>'success']);
     }
     public function getfreezeAll(request $request){
        $id= $request->id;
        $column=$request->column;
        $table=$request->table;

        DB::update('update '.$table.' set '.$column.' = ? where id = (?)',['1',$id]); 
        return "Update".$id."hi".$column."hi".$table."lll"; 
     
     }
     public function getUNfreezeAll(request $request){
        $id= $request->id;
        $column=$request->column;
        $table=$request->table;
        DB::update('update '.$table.' set '.$column.' = ? where id = (?)',['0',$id]); 
        return "Update".$id."hi".$column."hi".$table."lll"; 
     
     }
     public function ceiling_insert(request $request){
       
        $mandi_id=$request->mandi_id;
        $ceiling_price=$request->ceiling_price;
        $created_at = date('Y-m-d');
        $duplicate = MandiCeilingPriceDaily::where('mandi_id',$mandi_id)
                            ->where('created_at',$created_at)
                            ->count();
        if($duplicate)
        DB::update('update mandi_ceiling_price_daily set ceiling_price = ? where mandi_id = (?) and created_at= (?)',[$ceiling_price,$mandi_id,$created_at]);
        else
       DB::insert('insert into mandi_ceiling_price_daily (mandi_id, ceiling_price,created_at,updated_at) values (?, ?, ? , ?)', [$mandi_id, $ceiling_price,date('Y-m-d'),date('Y-m-d')]);
        return "Update".$mandi_id."hi".$ceiling_price."hi"; 
     }
}
