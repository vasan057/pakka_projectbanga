<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Mandi;
use App\Model\UsersBasic;
use App\Library\Dashboard;
use Validator;

class GeneralController extends Controller
{
    public function getMandi($user_id){
        $user = UsersBasic::find($user_id);
        $mandi  = Mandi::whereHas('userMap',function($q) use($user_id,$user){
                            if(in_array($user->roles_id,[2,3])){
                                $q->where('users_basic.id',$user_id);
                                $q->where('usermandimapping.active','1');
                            }
                        })
                        ->with('destinations')
                        ->get();
        return response()->json(['success'=>$mandi]);
    }

    public function getArthiyaByMandi(Request $request,$id){
        $user_id = $request->input('user_id',NULL);
        $user = UsersBasic::find($user_id);
        $mandi = Mandi::find($id);
        $users = [];
        if($mandi && count($mandi->userMap)){
            if($user && $user->roles_id == '2'){
                $users = $mandi->userMap()->where(['users_basic.roles_id'=>2,'users_basic.id'=>$user->id,'usermandimapping.active'=>'1'])->pluck('users_basic.user_id','users_basic.id');
            }else{
                $users = $mandi->userMap()->where(['users_basic.roles_id'=>2,'usermandimapping.active'=>'1'])->pluck('users_basic.user_id','users_basic.id');

            }
        } 
        $destination = [];
        if($mandi->destination) $destination = [['short_name' => $mandi->destination->short_name,'id'=>$mandi->destination->id]];
        $destinations = $mandi->destinations()->select(['destinations.short_name','destinations.id'])->get();
        $destinations = array_merge($destination,$destinations->toArray());
        $defult_destination  = $mandi->destination;
        if(!$defult_destination) $defult_destination = [];
        return response()->json(['success'=>'success','arthiya'=>$users,'destination'=>$destinations,'default_dest'=>$defult_destination]);
    }
    public function getDestinationByMandi($id){
        $mandi = Mandi::find($id);
        $destination = [];
        if($mandi->destination) $destination = [['short_name' => $mandi->location->short_name,'id'=>$mandi->location->id]];
        $destinations = $mandi->destinations()->select(['destinations.short_name','destinations.id'])->get();
        $destinations = array_merge($destination,$destinations->toArray());
        return response()->json(['success'=>$destinations]);
    }

    public function postUpdateFcm(Request $request){
        $validate = Validator::make($request->all(),[
            'user_id' => 'required',
            'fcm' => 'required',
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $user = UsersBasic::find($request->user_id);
        if($user){
            $user->fcm_token = $request->fcm;
            $user->save();
            return response()->json(['success'=>'sucsess']);
        }
        return response()->json(['error'=>'User not found']);
    }

    public function postMandiMapStatus(Request $request){
        $validate = Validator::make($request->all(),[
            'user_id' => 'required',
            'order_id' => 'required',
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $order = \App\Model\Order::find($request->order_id);
        if($order){
            $p_id = $order->user_id;
            $m_id = $order->mandi_id;
            $map = \App\Model\UserMandiMapping::where(['user_id'=>$p_id,'mandi_id'=>$m_id,'active'=>'1'])->first();
            if($map) return response()->json(['success'=>'success']);
            return response()->json(['error'=>'success']);
        }
        return response()->json(['error'=>'success']);
    }

    public function postDashboard(Request $request){
        $validate = Validator::make($request->all(),[
            'user_id' => 'required'
        ]);
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $user_id = $request->user_id;
        $user = UsersBasic::find($user_id);
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        if(in_array($user->roles_id,[2,3])){
            $arrival = Dashboard::getFacilitator($user,$from,$to);
            $offer = Dashboard::getOffer($user,$from,$to);
            $order = Dashboard::getOrder($user,$from,$to);
            $ceiling = Dashboard::getCeiling($user,$from,$to);
            $counter = Dashboard::getCounter($user,$from,$to);
            $data  = [];
            $data['arrival'] =  $arrival;
            $data['offer'] = $offer;
            $data['order'] = $order;
            $data['counter'] = $counter;
            $data['ceiling'] = $ceiling;
        }elseif($user->roles_id == 4){
            $arrival = Dashboard::getAllFacilitator($user,$from,$to);
            $offer = Dashboard::getPendingOffer($user,$from,$to);
            $order = Dashboard::getPendingOrder($user,$from,$to);
            $ceiling = Dashboard::getAllCeiling($user,$from,$to);
            $data = [];
            $data['arrival'] =  $arrival;
            $data['offer'] =  $offer;
            $data['order'] =  $order;
            $data['ceiling'] = $ceiling;
        }
        return response()->json(['success'=>$data]);
    }
}
