<?php
class MY_Model extends CI_Model { 
    
  function __construct(){
      parent::__construct();
  }

  public function ItextMo($contact,$txt1) {

    $api = 'ST-JOHNR477540_ZB21T';
    $password = 'b]@b239285';
    // ITEXTMO CODE
    $result = $this->itexmo($contact,$txt1,$api,$password);
    if ($result == ""){
    echo "iTexMo: No response from server!!!
    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
    Please CONTACT US for help. ";	
    }else if ($result == 0){
    //echo "Message Sent!";
    }
    else{	
    //echo "Error Num ". $result . " was encountered!"; 
    }
    // ITEXTMO CODE

  }

  //##########################################################################
  // ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
  // Visit www.itexmo.com/developers.php for more info about this API 
  //##########################################################################
  function itexmo($number,$message,$apicode,$password){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $password);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param); 
    return file_get_contents($url, false, $context);}
    //##########################################################################

}