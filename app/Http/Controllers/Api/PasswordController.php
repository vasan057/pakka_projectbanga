<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\UsersBasic;
use App\Model\PasswordReset;

class PasswordController extends Controller
{
    public function postSet(Request $request){
        $validate= Validator::make(
            $request->all(),
            [
            'mode' =>'required',
            'mobile' => 'required_if:mode,mobile|mobile',
            'email' => 'required_if:mobile,email|email'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $credential = [];
        $mode = $request->mode;
        $value = "NO";
        if($mode == 'mobile') {
            $credential=['mobile_1'=>$request->mobile];
            $value = $request->mobile;
        }
        if($mode == 'email') {
            $credential=['email_1'=>$request->email];
            $value = $request->email;
        }
        $user = UsersBasic::where($credential)->first();
        if($user){
           $otp = rand(10000,99999);
           $password = PasswordReset::firstOrCreate(['email'=>$value]);
           $password->token = $otp;
           $password->save();
           if($mode == 'email'){
            \Mail::raw('OTP to reset your password '.$otp.'. Validity 30 mins.', function ($message) use($value) {
                $message->to($value);
            });
            return response()->json(['success'=>'OTP sent']);
           }else{
              $sms= \App\Library\General::sendOTP($user->mobile_1,'OTP to reset your password '.$otp.'. Validity 30 mins.');
               return response()->json(['success'=>'OTP sent'.$sms]);
           }
        }else{
            return response()->json(['error'=>['User not found']]);
        }

    }

    public function postCheckOtp(Request $request){
        $validate= Validator::make(
            $request->all(),
            [
                'mode' =>'required',
                'mobile' => 'required_if:mode,mobile|mobile',
                'email' => 'required_if:mobile,email|email',
                'otp' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $credential = [];
        $mode = $request->mode;
        $value = "NO";
        if($mode == 'mobile') {
            $credential=['mobile_1'=>$request->mobile];
            $value = $request->mobile;
        }
        if($mode == 'email') {
            $credential=['email_1'=>$request->email];
            $value = $request->email;
        }
        $password = PasswordReset::where(['email'=>$value,'token'=>$request->otp])->first();
        if($password){
            $user = UsersBasic::where($credential)->first();
            if($user){
                return response()->json(['success'=>'successfull']);
            }
            return response()->json(['error'=>['user not found']]);
        }
        return response()->json(['errorr'=>['OTP not found']]);
    }

    public function postCreatePassword(Request $request){
        $validate= Validator::make(
            $request->all(),
            [
                'mode' =>'required',
                'mobile' => 'required_if:mode,mobile|mobile',
                'email' => 'required_if:mobile,email|email',
                'otp' => 'required',
                'password' => 'required'
            ]
        );
        if($validate->fails()) return response()->json(['error'=>$validate->errors()]);
        $credential = [];
        $mode = $request->mode;
        $value = "NO";
        if($mode == 'mobile') {
            $credential=['mobile_1'=>$request->mobile];
            $value = $request->mobile;
        }
        if($mode == 'email') {
            $credential=['email_1'=>$request->email];
            $value = $request->email;
        }
        $password = PasswordReset::where(['email'=>$value,'token'=>$request->otp])->first();
        if($password){
            $user = UsersBasic::where($credential)->first();
            if($user){
                $user->password = bcrypt($request->password);
                $user->save();
                $password->delete();
                return response()->json(['success'=>'successfull']);
            }
            return response()->json(['error'=>['user not found']]);
        }
        return response()->json(['errorr'=>['OTP not found']]);
    }
}
