<?php
class MPower_Utilities {

  // prevent instantiation of this class
  private function __construct() {}

  public static function httpRequest($url,$data=array()){
    Requests::register_autoloader();
    $headers = array(
      'Accept' => 'application/json',
      'MP-Public-Key' => "test_public_o6nfAM9hlt2XLoYYr52XArW3bCw",
      'MP-Private-Key' => "test_private_L9JdLI_AB8GEKBFTJyLF-07GqaY",
      'MP-Master-Key' => "3b8cfee0-f057-012f-b6c6-0026bb034858",
      'MP-Token' => "c2fb11fb8e9771c6dc12",
      'MP-Mode' => "test",
      'User-Agent' => "MPower Checkout API PHP client v1 aka Don Nigalon"
    );
    $request = Requests::post($url, $headers,json_encode($data));

    return array('status' => $request->status_code, 'body' => $request->body);
  }
}