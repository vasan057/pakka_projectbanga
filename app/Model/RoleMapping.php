<?php

namespace App\Model;
use App\Library\General;
use Illuminate\Database\Eloquent\Model;

class RoleMapping extends Model
{
    // protected $visible = ["raw_menu"];
    public function role(){
        return $this->belongsTo('App\Model\Role','role_id','id');
    }

    public function getDeviceNameAttribute(){
        $device = ["M"=>"Mobile","W"=>"Website"];
        return $device[$this->device_type];
    }

   
    public function getRawMenuAttribute(){
        $list = General::getViews();
        $mobile = $list['Mobile'];
        if($this->device_type == 'M'){
            if(isset($mobile[$this->menu])) return $mobile[$this->menu];
        }
        return $this->menu;
    }

    public function getStatusAttribute(){
        $status = ['Inactive','Active'];
        return $status[$this->is_active];
    }

    public function getStatusButtonAttribute(){
        $status = ["Activate","Inactive"];
        return $status[$this->is_active];
    }

}
