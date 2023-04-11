<?php

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