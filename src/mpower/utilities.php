<?php
class MPower_Utilities {

  // prevent instantiation of this class
  private function __construct() {}

  public static function httpJsonRequest($url,$data=array()){
    Requests::register_autoloader();
    $headers = array(
      'Accept' => 'application/json',
      'MP-Public-Key' => MPower_Setup::getPublicKey(),
      'MP-Private-Key' => MPower_Setup::getPrivateKey(),
      'MP-Master-Key' => MPower_Setup::getMasterKey(),
      'MP-Token' => MPower_Setup::getToken(),
      'MP-Mode' => MPower_Setup::getMode(),
      'User-Agent' => "MPower Checkout API PHP client v1 aka Don Nigalon"
    );
    if (JSON_ENCODE_PARAM_SUPPORT) {
      $json_payload = json_encode($data,JSON_FORCE_OBJECT);
    }else{
      $json_payload = json_encode((object)$data);
    }

    $request = Requests::post($url, $headers,$json_payload,array('timeout' => 10));

    return json_decode($request->body,true);
  }

  public static function httpPostRequest($url,$data=array()){
    Requests::register_autoloader();
    $headers = array(
      'Accept' => 'application/x-www-form-urlencoded',
      'MP-Public-Key' => MPower_Setup::getPublicKey(),
      'MP-Private-Key' => MPower_Setup::getPrivateKey(),
      'MP-Master-Key' => MPower_Setup::getMasterKey(),
      'MP-Token' => MPower_Setup::getToken(),
      'MP-Mode' => MPower_Setup::getMode(),
      'User-Agent' => "MPower Checkout API PHP client v1 aka Don Nigalon"
    );

    $request = Requests::post($url, $headers,$data,array('timeout' => 10));

    return json_decode($request->body,true);
  }

  public static function httpGetRequest($url){
    Requests::register_autoloader();
    $headers = array(
      'MP-Public-Key' => MPower_Setup::getPublicKey(),
      'MP-Private-Key' => MPower_Setup::getPrivateKey(),
      'MP-Master-Key' => MPower_Setup::getMasterKey(),
      'MP-Token' => MPower_Setup::getToken(),
      'MP-Mode' => MPower_Setup::getMode(),
      'User-Agent' => "MPower Checkout API PHP client v1 aka Don Nigalon"
    );

    $request = Requests::get($url, $headers,array('timeout' => 10));

    return json_decode($request->body,true);
  }
}