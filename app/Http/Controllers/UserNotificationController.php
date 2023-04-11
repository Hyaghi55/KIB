<?php

namespace App\Http\Controllers;

use App\UserNotification;
use App\User;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_api()
    {
        $user_notifications=UserNotification::user_notification_index();
        return response()->json(['status' => True, 'data' => $user_notifications, 'message' => '','type'=>'array']);

    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_notifications='';
        $notification_id=$request['notification_id'];
        $users=User::user_index();
        foreach ($users as $key => $user) {
            $user_id=$user->id;
            $user_notification=UserNotification::user_notification_create($user_id,$notification_id);
            $user_notifications=$user_notifications.$user_notification;
        }
          return response()->json(['status' => True, 'data' => $user_notifications, 'message' => '','type'=>'array']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function show_by_user_id(Request $request)
    {
        $user_id=$request['id'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(UserNotification $userNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserNotification $userNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserNotification $userNotification)
    {
        //
    }


public function delivered(Request $request)
{
    $id=$request['id'];
    $notification=UserNotification::user_notification_delivered($id);
     return response()->json(['status' => True, 'data' => $notification, 'message' => '','type'=>'object']);
}

}
