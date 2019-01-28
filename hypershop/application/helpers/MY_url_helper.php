<?php

/**
 * Redirect to previous page if http referer is set. Otherwise to server root.
 */
 
if ( ! function_exists('redirect_back'))
{
    function redirect_back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}


if ( ! function_exists('debug'))
{
    function debug($variable)
    {
        echo '<pre>';
        print_r($variable);
        echo '</pre>';
    }
}




if(!function_exists('sendSms')) {

  function send_sms($params, $token, $backup = false ) {

        static $content;

        if($backup == true){
            $url = 'https://api2.smsapi.com/sms.do';
        }else{
            $url = 'https://api.smsapi.com/sms.do';
        }

        $c = curl_init();
        curl_setopt( $c, CURLOPT_URL, $url );
        curl_setopt( $c, CURLOPT_POST, true );
        curl_setopt( $c, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $c, CURLOPT_HTTPHEADER, array(
           "Authorization: Bearer $token"
        ));

        $content = curl_exec( $c );
        $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

        if($http_status != 200 && $backup == false){
            $backup = true;
            send_sms($params, $token, $backup);
        }

        curl_close( $c );
        return $content;
  }

  if(!function_exists('formatDateToPHP')) {

    function formatDateToPHP($date) {
        if(!$date) return "";
        $date = DateTime::createFromFormat("Y-m-d", $date);
        if(!$date) return "00-00-0000";
        return $date->format("d/m/Y");
        
    }

}

 if(!function_exists('DateToView')) {
    function DateToView($date) {
    if (is_null($date)) {
        //use 1999-12-31 as a valid date or as an alert
        return "Non defini";
    }

    if (($t = strtotime($date)) === false) {
        //use 1999-12-31 as a valid date or as an alert
        return "Non defini";
    } else {
        return date('d/m/Y à H:i:s', strtotime($date));
    }
}
   

}

 if(!function_exists('formatDateToPHP')) {

    function formatHourToPHP($hour) {
        if(!$hour) return "";
        $hour = DateTime::createFromFormat("H:i", $hour);
        if(!$hour) return "00:00";
        return $hour->format("H:i");
        
    }

}

  

}
