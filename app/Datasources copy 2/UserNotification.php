<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
   
     protected $fillable = [
        'id','user_id', 'notification_id', 'delivered',
    ];


          public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
    
    public function notification()
    {
    	return $this->belongsTo('App\Notification',"notification_id");
    }




    public static  function user_notification_index()
    {
    	$user_notifications=UserNotification::with('user','notification')->get();
    	return $user_notifications;
    }

        public static  function notifications_by_user($user_id)
    {
    	$user_notifications=UserNotification::where('user_id',$user_id)->get();
    	return $user_notifications;
    }



            public static  function notifications_by_user_unseen($user_id)
    {
    	$user_notifications=UserNotification::where('user_id',$user_id)->where('delivered','unseen')->get();
    	return $user_notifications;
    }




    public static  function user_notification_create($user_id,$notification_id)
    {
        $user_notification=new UserNotification;
        $user_notification->user_id=$user_id;
        $user_notification->delivered='unseen';
        $user_notification->notification_id=$notification_id;
        $user_notification->save();
        return $user_notification;
    }

        public static function user_notification_delivered($id)
    {
        $user_notification=UserNotification::find($id);
        $user_notification->delivered='delivered';
        $user_notification->save();
        return $user_notification;
    }

        public static function user_notification_update($id,$user_id,$notification_id,$delivered)
    {
        $user_notification=UserNotification::find($id);
        $user_notification->user_id=$user_id;
        $user_notification->delivered=$delivered;
        $user_notification->notification_id=$notification_id;
        $user_notification->save();
        return $user_notification;
    }
}
