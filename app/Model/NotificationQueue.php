<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;
class NotificationQueue extends Model
{
    protected $table= 'notifications_queue';

    public static function notificationsAlert()
    {
    	$notfication_list['notifications'] = self::where(['user_id'=>Auth::user()->id,'read'=>NULL])->get();
    	$notfication_list['count'] = self::where(['user_id'=>Auth::user()->id,'read'=>NULL])->count();
    	return $notfication_list;
    }
}
