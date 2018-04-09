<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ForFreight extends Model
{
    protected $table = 'for_freight';

    public function getFreightValueAttribute($value){
        return (float)($value);
    }
    public function mandis(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
    public function destinations(){
        return $this->belongsTo('App\Model\Destination','destination_id','id');
    }
    public function forlineitems(){
        return $this->belongsTo('App\Model\ForLineItem','gid','group');
    }
    public function forlinelist(){
        $date = date('Y-m-d');
        return $this->hasMany('App\Model\ForLineItem','group','gid')
                                ->where('valid_from','<=',$date)
                                ->where('valid_to','>',$date)
                                ->orderBy('sequence','asc');
    }
   public function getValidFromAttribute($value)
   {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
   }
   public function getValidToAttribute($value)
   {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
   }
   

}
