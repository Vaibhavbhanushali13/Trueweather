<?php

//timezone
date_default_timezone_set('Asia/Kolkata');
include (dirname(__DIR__).'/helpers/constant.php');
include (dirname(__DIR__).'/helpers/callCurl.php');

if(isset($_REQUEST) && !empty($_REQUEST)){
  $Weather_object = new WeatherController();
  $location = $_REQUEST['search'];
  $cordinate = $Weather_object->getWheatherReport($location);
  if(isset($cordinate['list'][0]) && !empty($cordinate['list'][0])){
      $response =$cordinate['list'][0]['coord'];
      $lat  = $response['lat'];
      $lon = $response['lon'];
      $weather_response = $Weather_object->getWheatherReportWeek($lat,$lon);
      if(isset($weather_response) &&  !empty($weather_response)){
        $status = 1;
        $response = $weather_response;
        $msg = '';
      }else{
        $status = 0;
        $response = '';
        $msg = 'No response found';
      }
  }else{
      $status = 0;
      $response = '';
      $msg = 'Co-ordinate not found';
  }
  echo json_encode(['status'=>$status,'data'=>$response,'msg'=>$msg]);
}


class WeatherController{



  /**
     * description: get longitude and latitude
     * @return array $res
     * Vaibhav
     * 22-Aug-2021
     * Vaibhav Bhanushali
  */

   function getWheatherReport($country=''){
    try{
      error_log(date('Y-m-d H:i:s') . ' debug: ' . 'entered  in ' . __FUNCTION__.' function'."\r\n", 3, LOG_FILE);
      $app_id = APP_ID;
      $url = 'https://openweathermap.org/data/2.5/find?q='.$country.'&appid='.$app_id.'&units=metric';
      $call_curl = new callCurl();
      $res = $call_curl->curlCallApi($url);
      return $res;
    }catch(Exception $e){
      error_log(date('Y-m-d H:i:s') . ' error:' . $exception->getMessage() . "\r\n", 3, LOG_FILE);
    }
  }

  /**
     * description: Get weather report of Week
     * @return array $res
     * Vaibhav
     * 22-Aug-2021
     * Vaibhav Bhanushali
  */

  function getWheatherReportWeek($lat,$lon){
    try{
      error_log(date('Y-m-d H:i:s') . ' debug: ' . 'entered  in ' . __FUNCTION__.' function'."\r\n", 3, LOG_FILE);
      $app_id = APP_ID;
      $url ='https://openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$lon.'&units=metric&appid='.$app_id;
      $call_curl = new callCurl();
      $res = $call_curl->curlCallApi($url);
      return $res;
    }catch(Exception $e){
      error_log(date('Y-m-d H:i:s') . ' error:' . $exception->getMessage() . "\r\n", 3, LOG_FILE);
    }
  }
}

 ?>
