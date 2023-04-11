<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_helper extends Model
{
    public static function RandomString()
{
       $code=strval(rand(100000,999999));
    return $code;
}

    public static function send_sms($mobile,$otp) {
      $message = 'Your activation code is: ' . $otp;
      // $_url='https://bms.syriatel.sy/API.asmx?wsdl?user_name=IETS&password=P@123456&msg='.$message.'&sender='.'KIB'.'&to=963'.$mobile;
      $_url='https://bms.syriatel.sy/API/SendSMS.aspx?user_name=IETS&password=K@123456&msg='.$message.'&sender=IETS. Co.&to=963'.$mobile;
      // var_dump($_url);
      $_url = preg_replace("/ /", "%20", $_url);
      $result = file_get_contents($_url);
       // var_dump($result,"<br>");
      return $result;
  }


      public static function send_sms_post(Request $request) {
        echo($this->send_sms($request['mobile'], $request['otp']));
    }
}
