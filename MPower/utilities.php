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
    $request = Requests::post($url, $headers,json_encode($data,JSON_FORCE_OBJECT));

    return json_decode($request->body,true);
  }

  public static function httpRequest($url,$data=array()){
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

    $request = Requests::post($url, $headers,$data);

    return json_decode($request->body,true);
  }
}