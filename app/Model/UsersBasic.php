<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersBasic extends Authenticatable
{
    protected $table = 'users_basic';
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleViewAttribute(){
        $views = [
            1 => 'admin',
            2 => 'pakka',
            3 => 'facilitator',
            4 => 'ubp'
        ];
        return $views[$this->roles_id];
    }
    public function role(){
        return $this->belongsTo('App\Model\Role','roles_id','id');
    }
    public function getMobileRole(){
       return $this->hasMany('App\Model\RoleMapping','role_id','roles_id')->where(['device_type'=>'M','is_active'=>1]);
    }
    public function getWebRole(){
       return $this->hasMany('App\Model\RoleMapping','role_id','roles_id')->where(['device_type'=>'W','is_active'=>1]);
    }
}
