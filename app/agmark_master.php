<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class agmarknet extends Model
{
   public $fillable = ['mandi_id','state_name','district_name','market_center_name','variety','group_name','arrival','ag_min','ag_max','modal','date_arrival'];
}