<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
       protected $fillable = [
        'user_id', 'service_id', 'reason',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

       public function service()
    {
    	return $this->belongsTo('App\Service','service_id');
    }

    public function complaint_index()
    {
    	$complaints=Complaint::with('user','service')->get();
    	return $complaints;
    }

    public static function complaint_create($user_id,$service_id,$reason)
    {
    	$complaint=new Complaint;
    	$complaint->user_id=$user_id;
    	$complaint->service_id=$service_id;
    	$complaint->reason=$reason;
    	$complaint->save();
    	return $complaint;
    }

    public static function complaint_update($id,$user_id,$service_id,$reason)
    {
    	$complaint=Complaint::find($id);
    	$complaint->user_id=$user_id;
    	$complaint->service_id=$service_id;
    	$complaint->reason=$reason;
    	$complaint->save();
    	return $complaint;
    }

    public static function complaint_delete($id)
    {
    	$complaint=Complaint::find($id);
    	$complaint->delete();
    }
}
