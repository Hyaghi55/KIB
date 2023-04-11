<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    

        protected $fillable = [
        'title', 'body','user_id','active',
    ];



         public function users()
    {
        return $this->belongsToMany('App\User','user_notifications')->as('users')->withPivot('delivered')->withTimestamps();
    }



    public static function notification_create($title,$body,$user_id=null)
    {
    	$notification=new Notification;
    	$notification->title=$title;
    	$notification->body=$body;
    	$notification->user_id=$user_id;
        $notification->active='1';
    	$notification->save();
    	return $notification;
    }



    public static function notification_deactivate($notification_id)
    {
        $notification=Notification::find($notification_id);
        $notification->active='0';
        // $notification->body=$body;
        // $notification->user_id=$user_id;
         $notification->save();
        return $notification;
    }

    public static function notification_index()
    {
        $notifications=Notification::all();
        return $notifications;
    }


    public static function notification_pending()
    {
        $notifications=Notification::where('active',1)->get();
        return $notifications;
    }
}
