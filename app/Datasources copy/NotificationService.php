<?php
namespace App;
use App\Notification;
use App\Token;
use App\Helpers\PermissionHelper;

class NotificationService
{


  public static function send_notification_to_device($request)
  {


        $notification_data=[];

        if (! empty ($request->tokens)) {
        $notification_data =$request->tokens; //get all id from table

        }


          if($notification_data != NULL){

              foreach ($notification_data as $notification_data_row) {

                NotificationService::SendToDevice($notification_data_row->id,$request->body,$request->title);
              }


          }else {

            NotificationService::SendToTopic('ios',$request->body,$request->title);
            NotificationService::SendToTopic('android',$request->body,$request->title);
          }

  }

  public static  function send_notification_order($notification_data,$body,$title,$type=1,$orderNumber=1){

    foreach ($notification_data as $notification_data_row) {

      NotificationService::SendToDevice($notification_data_row,$body,$title,$type,$orderNumber);
    }
  }
  /**
   * Display the specified resource.
   *
   * @param  \App\Notification  $notification
   * @return \Illuminate\Http\Response
   */
  public static function SendToDevice($registrationIds,$body,$title,$type=1,$orderNumber=1)
  {

    $Token=Token::where('id',$registrationIds)->first();

    $registrationIds=$Token->token;

 $type = ($type != 1) ? 'order_'.$orderNumber : '' ;

 $click= ($type != 1) ? 'MyOrderActivity' : 'HomeActivity' ;

$msg = array
    (
      'body'  => $body,
      'title' => $title,
      'type'=>$type,
      'click_action' => $click,
      'icon'  => 'ic_launcher_round'/*Default Icon*/

    // 'icon'  => 'myicon',/*Default Icon*/
    // 'sound' => 'mySound'/*Default sound*/
    );

        if($Token->os=='ios')
        $fields = array(
                'to' => $registrationIds,
                'data'  => $msg,
                'content_available' => true,
                'priority' => 'high',
                'notification' => array('sound' => 'default', 'badge' => 0, 'body' => $body , 'title'=>$title,'type'=>$type)
            );
      else
    $fields = array
        (
        'to' => $registrationIds,
        'data'  => $msg
        // 'body'  => 'body msg',
        // 'title' => 'title msg',
        );
    $headers = array
        (
        'Authorization: key=' . "AAAAbVPtSqc:APA91bFeLNlQSxDYX6QSzIG1N8T2RW-KGxGKmKnoRq-5rVTCw86VDPwyMZ9FLemTLUHng7f6QNm2MyAWcl_71SQiOi-7Eef4qjVaahzH4iMP-GBnwlA-NjF6ZOvBw8_CDZxPSmmlYsC4",
        'Content-Type: application/json'
        );
#Send Reponse To FireBase Server
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

    $result = curl_exec ( $ch );
    // echo "<pre>";print_r($result);exit;
    curl_close ( $ch );

      NotificationService::store($title,$body,$Token->client_id);

    // echo $result;
  }
  /**
   * Display the specified resource.
   *
   * @param  \App\Notification  $notification
   * @return \Illuminate\Http\Response
   */
  public static function SendToTopic($os,$body,$title)
  {
    $msg = array
        (
        'body'  => $body,
        'title' => $title,
        'type' => 'public',
        'click_action' => 'https://khouryinsurance.com/',
        'icon'  => 'https://khouryinsurance.com/main_site/img/Logo.png'/*Default Icon*/
        // 'sound' => 'mySound'/*Default sound*/
        );

        if ($os=='ios') {
          $fields = array(
                  'to' => '/topics/allUsers',
                  'data'  => $msg,
                  'content_available' => true,
                  'priority' => 'high',
                  'notification' => array('sound' => 'default', 'badge' => 0, 'body' => $body , 'title'=>$title,'type'=>'public')
              );
        }else {
          $fields = array
              (
              'to' => '/topics/allUsers',
              'data'  => $msg
              // 'body'  => 'body msg',
              // 'title' => 'title msg',
              );
        }

    $headers = array
        (
        'Authorization:key=AIzaSyBE17OESDR3s5CcEVa6YxU96qLAirkn0Uw',
        'Content-Type: application/json'
        );
#Send Reponse To FireBase Server
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

    $result = curl_exec ( $ch );
    // echo "<pre>";print_r($result);exit;
    curl_close ( $ch );
    // echo $result;
    NotificationService::store($title,$body);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public static function store($title,$body,$client_id=NULL)
  {
      Notification::create([
        'title'=>$title,
        'body'=>$body,
        'user_id'=>$client_id
      ]);


  }

}
