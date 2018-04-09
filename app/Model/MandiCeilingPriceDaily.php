<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MandiCeilingPriceDaily extends Model
{
    protected $table = 'mandi_ceiling_price_daily';

    protected $fillable = ["mandi_daily_price_id"];

    public function mandi(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
}
