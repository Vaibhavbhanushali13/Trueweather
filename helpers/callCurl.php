<?php

class callCurl{

  public static function curlCallApi($url)
  {
      try {
          error_log(date('Y-m-d H:i:s') . ' debug:' . 'entered  in  ' . __FUNCTION__."\r\n", 3, LOG_FILE);
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $url);
          curl_setopt($curl, CURLOPT_HEADER, 0);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
          $result = curl_exec($curl);
          if (curl_errno($curl)) {
               $error_msg = curl_error($curl);
               error_log(date('Y-m-d H:i:s') . ' error:' . 'entered  in  ' . __FUNCTION__. ' Mail failed error msg ' .$error_msg."\r\n", 3, LOG_FILE);
               return false;
            }
            $response = json_decode($result, true);
            return $response;
        } catch (Exception $e) {
            error_log(date('Y-m-d H:i:s') . ' debug:' . 'entered  in  ' . __FUNCTION__. $e->Message()."\r\n", 3, LOG_FILE);
            throw $e;
        }
    }

}

?>
