<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MandiDestinationMapping extends Model
{
    protected $table = 'mandidestinationmapping';

    public function destination(){
        return $this->belongsTo('App\Model\Destination','destination_id','id');
    }
    public function mandi(){
        return $this->belongsTo('App\Model\Mandi','mandi_id','id');
    }
}
