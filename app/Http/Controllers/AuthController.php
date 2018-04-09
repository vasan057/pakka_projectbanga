<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use Auth;
use DB;
use Mail;
use App\Model\PasswordReset;
use App\Model\UsersBasic;
use App\Library\General;

class AuthController extends Controller
{
    public function getIndex(){
        
    }
    public function getLogin(){
        return view('auth.login');
    }
    public function postApiLogin(Request $request){
        $validate = Validator::make($request->all(),[
            'user_id' => 'required|user_id',
            'password' => 'required'
        ]);
        if($validate->fails()) return response(['status'=>'error']);
        $credential = ['user_id'=>$request->user_id,'password'=>$request->password];
        $mobile_key = General::getViews();
        $mobile_key = $mobile_key['Mobile'];
		
        if(Auth::once($credential)){
			if($request->input('fcm',NULL)) {
            $user = Auth::user();
            $user->fcm_token = $request->input('fcm');
            $user->save();
		}
		return response(['status'=>Auth::user()->id,'menu'=>Auth::user()->getMobileRole,'user_id'=>Auth::user()->user_id,'role'=>Auth::user()->role,'drop_down'=>$mobile_key]);
        }
        return response(['status'=>'error']);
    }
    public function postApiLogout(Request $request){
        $validate = Validator::make($request->all(),[
            'user_id' => 'required|user_id',
        ]);
        $user = UsersBasic::find($request->user_id);
        $user->fcm_token = "";
        $user->save();
        return response(['success'=>'success']);
    }
    public function getTokenreset($value='')
    {
        return view('auth.passwords.token');
    }
    public function postLogin(Request $request){
        $validate = Validator::make($request->all(),[
            'user_id' => 'required|user_id',
            'password' => 'required'
        ]);
        $is_password = $request->get('password');
        $is_checktoken= PasswordReset::where('token',$is_password)->first();
        if($is_checktoken){
            return redirect('auth/tokenreset');
        }
        $credential = ['user_id'=>$request->user_id,'password'=>$request->password];
        if($validate->fails()) return redirect()->back()->withInput()->withErrors($validate);
        $credential = ['user_id'=>$request->user_id,'password'=>$request->password];
        $remember = $request->input('remember',false);
        $user_active_check = UsersBasic::where(['user_id'=>$request->user_id,'active'=>1])->first();
        if(empty($user_active_check)){
            return redirect()->back()->withInput()->withErrors(['error'=>'Your user Id is not active']);
        }
        if(Auth::attempt($credential)){
            return redirect()->to('home');
        }else{
            return redirect()->back()->withInput()->withErrors(['error'=>'Invalid username & password']);
        }
    }
    public function postResetoken(Request $request)
    {
       $validate = Validator::make($request->all(),
                [
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                    'token' => 'required|exists:password_resets,token'
                ]
            );
        if($validate->fails()) return back()->withInput()->withErrors($validate);
        $token = $request->token;
        $password = PasswordReset::where('token',$token)->first();
        if(!$password) abort(404);
        $user = $password->user;
        if(!$user) abort(404);
        $user->password  = bcrypt($request->password);
        $user->save();
        if(Auth::loginUsingId($user->id)){
            $password->delete();
            return redirect('home');
        }
    }
    public function getReset(){
        return view('auth.passwords.email');
    }

    public function postReset(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email|exists:users_basic,email_1',
        ]);
        if($validate->fails()) return redirect()->back()->withInput()->withErrors($validate);
        $token = str_random(10);
        $email =  $request->email;
        PasswordReset::where('email',$email)->delete();
        PasswordReset::create([
            'email'=>$email,
            'token'=>$token
        ]
        );
        Mail::send('emails.reset', ['token' => $token,'email' => $email], function ($m) use ($email) {
            $m->to($email, 'Customer')->subject('Your Reset password!');
        });
        return redirect('auth/login')->with('status','We shared the mail ID credentials on your  mail');
    }

    public function getPassword($token){
        $password = PasswordReset::where('token',$token)->first();
        if(!$password) abort(404);
        $user = $password->user;
        if(!$user) abort(404);
        return view('auth.passwords.reset',['user'=>$user,'token'=>$token]);
    }


    public function postPassword(Request $request){
        $validate = Validator::make($request->all(),
                [
                    'user_id' => 'required|exists:users_basic,user_id',
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                    'token' => 'required|exists:password_resets,token'
                ]
            );
        $token = $request->token;
        if($validate->fails()) return redirect()->back()->withInput()->withErrors($validate);
        $password = PasswordReset::where('token',$token)->first();
        if(!$password) abort(404);
        $user = $password->user;
        if(!$user) abort(404);
        $user->password  = bcrypt($request->password);
        $user->save();
        if(Auth::loginUsingId($user->id)){
            $password->delete();
            return redirect('home');
        }
        dd($user);
    }
}
