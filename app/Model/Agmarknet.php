<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agmarknet extends Model
{
    protected $table = 'agmarknet';
    protected $fillable = ['agmark_master_id','date_arrival'];
    public function mandi(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
    public function agmarkmaster(){
        return $this->belongsTo('App\Model\AgmarkMaster','agmark_master_id','id');
    }
 
}
