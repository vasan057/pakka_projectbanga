<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MandiDailyPrice extends Model
{
    protected $table = 'mandi_daily_price';

    protected $fillable = ['mandi_id','date'];

    public function mandi(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
    public function agmarketnet($days){
        return $this->belongsToMany('App\Model\Agmarknet','mandis','id','agmark_market_id')->whereNull('is_old')->orderBy('agmarknet.date_arrival','desc')->limit($days);
    }

    public function user(){
        return $this->belongsTo('App\Model\UsersBasic','created_by','id');
    }

    public function ceiling(){
        return $this->hasOne('App\Model\MandiCeilingPriceDaily','mandi_daily_price_id','id');
    }
    public function ceilingHistory(){
        return $this->hasOne('App\Model\MandiCeilingPriceHistory','mandi_daily_price_id','id')->OrderBy('created_at','desc');
    }
}
