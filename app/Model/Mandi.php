<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mandi extends Model
{
    public function states(){
        return $this->belongsTo('App\Model\State','state','id');
    }
    public function location(){
        return $this->belongsTo('App\Model\Location','location_id','id');
    }
    public function destination(){
        return $this->belongsTo('App\Model\Destination','destination_id','id');
    }
    public function destinations(){
        return $this->belongsToMany('App\Model\Destination','mandidestinationmapping','mandi_id','destination_id');
    }
    public function districts(){
        return $this->belongsTo('App\Model\Location','district','id');
    }
    public function users(){
        return $this->belongsToMany('App\Model\UsersBasic','usermandimapping','mandi_id','user_id');
    }
    public function user(){
        return $this->belongsTo('App\Model\UsersBasic','user_id','id');
    }
    public function agmark(){
        return $this->belongsTo('App\Model\AgmarkMaster','agmark_market_id','id');
    }
    public function agmark_master(){
        return $this->belongsTo('App\Model\AgmarkMaster','market_name');
    }

    public function userMap(){
        return $this->belongsToMany('App\Model\UsersBasic','usermandimapping','mandi_id','user_id');
    }

    public function orders(){
        return $this->hasMany('App\Model\Order','mandi_id','id');
    }

    public function dailyPrice(){
        return $this->hasOne('App\Model\MandiDailyPrice','mandi_id','id');
                     
    }
}
