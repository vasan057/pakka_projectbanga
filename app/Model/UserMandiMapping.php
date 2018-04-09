<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserMandiMapping extends Model
{
    protected $table = 'usermandimapping';

    public function user(){
        return $this->belongsTo('App\Model\UsersBasic','user_id','id');
    }

    public function mandi(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
   
}
