<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function getIssActiveAttribute(){
        $device = ["1"=>"Active","0"=>"Inactive"];
        return $device[$this->is_active];
    }
}
