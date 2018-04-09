<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\UsersBasic;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleManagerController extends Controller
{
    public function getRole($id){
        $user = UsersBasic::find($id);
        if($user)
        {
            return response()->json(['success'=>$user->getMobileRole,'role'=>$user->role]);
        }
        return response()->json(['error'=>'User not found']);

    }
}
