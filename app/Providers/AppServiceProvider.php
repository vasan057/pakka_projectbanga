<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Validator::extend('mobile', function($attribute, $value, $parameters) {
           return preg_match("/^[0-9]{10}/", $value);
        });
        Validator::extend('price', function($attribute, $value, $parameters) {
            return preg_match("/[0-9]/", $value);
         });
        Validator::extend('pincode', function($attribute, $value, $parameters) {
            return preg_match("/[0-9]{6}/", $value);
         });
         Validator::extend('user_id', function($attribute, $value, $parameters) {
             $user = \App\Model\UsersBasic::where('user_id',$value)->count();
             if($user) return true;
            return false;
         });
         Validator::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value); 
        });
        Validator::extend('alpha_num_underscore', function ($attribute, $value) {
            return preg_match('/^[A-Za-z0-9_]+$/u', $value); 
        });
        Validator::extend('alpha_num_space_underscore', function ($attribute, $value) {
            return preg_match('/^[A-Za-z0-9_\pL\s]+$/u', $value); 
        });
        Validator::extend('positive_number', function ($attribute, $value) {
            return preg_match('/^[0-9]\d*(\.\d+)?$/', $value); 
        });
        Validator::extend('alpha_alphanum', function ($attribute, $value) {
            return preg_match('/^(\d*[a-zA-Z]\d*)+$/', $value); 
        });
        Validator::extend('natural_number', function ($attribute, $value) {
            return preg_match('/^[1-9]\d*(\.\d+)?$/', $value); 
        });
        Validator::extend('positive_integer', function ($attribute, $value) {
            return preg_match('/^[1-9][0-9]*$/', $value); 
        });
        Validator::extend('greater_than', function($attribute, $value, $params, $validator) use($request){
            list($other) = $params;
            $other =$request->$other;
            return intval($value) > intval($other);
        });
        Validator::extend('greater_than_equal', function($attribute, $value, $params, $validator) use($request){
            list($other) = $params;
            $other =$request->$other;
            return intval($value) >= intval($other);
        });
        Validator::extend('lesser_than', function($attribute, $value, $params, $validator) use($request){
            list($other) = $params;
            $other =$request->$other;
            return intval($value) < intval($other);
        });
        Validator::replacer('lesser_than', function($message, $attribute, $rule, $params) {
            return str_replace('_', ' ' , 'The '. $attribute .' must be lesser than the ' .$params[0]);
        });
        Validator::replacer('greater_than', function($message, $attribute, $rule, $params) {
            return str_replace('_', ' ' , 'The '. $attribute .' must be greater than the ' .$params[0]);
        });
        Validator::replacer('greater_than_equal', function($message, $attribute, $rule, $params) {
            return str_replace('_', ' ' , 'The '. $attribute .' must be greater than or equal ' .$params[0]);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
