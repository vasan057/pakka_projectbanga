<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public function state(){
        return $this->belongsTo('App\Model\State','state','id');
    }
}
