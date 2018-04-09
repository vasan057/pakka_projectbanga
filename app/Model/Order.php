<?php

namespace App\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SearchableTrait;
    protected $searchable = [
        'columns' => [
            'orders.order_number' => 1,
            'mandis.mandi_name' => 1,
            'mandis.short_name' => 1,
            'users_basic.user_id' => 1,
            'destinations.delivery_name' => 1,
            'destinations.short_name' => 1,
        ],
        'joins' => [
            'mandis' => ['orders.mandi_id','mandis.id'],
            'users_basic' => ['orders.user_id','users_basic.id'],
            'destinations' => ['orders.destination_id','destinations.id'],
        ]
    ];


    public function mandi(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
    public function pakka_arthiya(){
        return $this->belongsTo('App\Model\UsersBasic','user_id','id');
    }
    public function destination(){
        return $this->belongsTo('App\Model\Destination','destination_id','id');
    }
    public function getStatusStringAttribute(){
        $status = ['In active','Active'];
        return $status[$this->status];
    }
    
    public function forFreight(){
        $date = date('Y-m-d');
        $destination  = $this->destination_id;
        return $this->hasOne('App\Model\ForFreight','mandi_id','mandi_id')
                                ->where('destination_id',$destination)
                                ->where('valid_from','<=',$date)
                                ->where('valid_to','>',$date)
                                ->orderBy('valid_from', 'dsc');
    }
    public function getStatusOfferAttribute(){
        $status = ['submitted','NA','Accepted','Rejected'];
        return $status[$this->status];
    }

    public function mandiMapping(){
        return $this->hasMany('App\Model\UserMandiMapping','mandi_id','mandi_id');
    }

    public function user(){
        return $this->belongsTo('App\Model\UsersBasic','created_by','id');
    }
}
