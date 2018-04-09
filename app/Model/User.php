<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users_basic';
    public function role(){
        return $this->belongsTo('App\Model\Role','roles_id','id');
    }
}
