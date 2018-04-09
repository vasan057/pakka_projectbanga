<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ForLineItem extends Model
{
   // protected $table = 'for_line_items';

   public function setValidFromAttribute($value){
        $this->attributes['valid_from'] =  date('Y-m-d 00:00:00',strtotime($value));
   }
   public function setValidToAttribute($value){
    $this->attributes['valid_to'] =  date('Y-m-d 00:00:00',strtotime($value));
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
