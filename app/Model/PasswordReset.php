<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = ["email","token"];
    public function user(){
        return $this->hasOne('App\Model\UsersBasic','email_1','email');
    }
}
