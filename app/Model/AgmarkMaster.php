<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AgmarkMaster extends Model
{
    protected $table = 'agmark_master';
    public function mandi(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
    public function location(){
        return $this->belongsTo('App\Model\Location','location_id','id');
    }
    public function agmarknet(){
        return $this->hasmany('App\Model\Agmarknet','agmark_master_id','id')->whereNull('is_old');
    }

    public function getActiveAttribute($value)
    {
        return $value == 1 ? 'active':'inactive';
    }
    
}
