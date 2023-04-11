<?php

namespace App\Http\Controllers;

use App\Notification;
use App\UserNotification;
use App\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications=Notification::notification_index();
        return view('admin.notification.index',compact('notifications'));
    }




        public function pending_api()
    {
        $notifications=Notification::notification_pending();
        return response()->json(['status' => True, 'data' => $notifications, 'message' => '','type'=>'array']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title=$request['title'];
        $body=$request['body'];
         NotificationService::SendToTopic('android',$body,$title);
         Notification::notification_create($title,$body,$user_id=null);
        return redirect('/admin/notification/index');
        // return $notification;
    }

        public function store_api(Request $request)
    {

        $title=$request['title'];
        $body=$request['body'];
         //NotificationService::SendToTopic('android',$body,$title);
        $notification= Notification::notification_create($title,$body,$user_id=null);
           return response()->json(['status' => True, 'data' => $notification, 'message' => '','type'=>'array']);
        // return $notification;
    }




        public function deactive(Request $request)
    {
        // $title=$request['title'];
        $id=$request['id'];
         // NotificationService::SendToTopic('android',$body,$title);
        $notification= Notification::notification_deactivate($id);
        return $notification;
        // return $notification;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
