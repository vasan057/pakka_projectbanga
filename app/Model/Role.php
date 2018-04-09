<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     public function getIsActiveAttribute(){
        $device = ["1"=>"Active","0"=>"Inactive"];
        return $device[$this->active];
    }
}
