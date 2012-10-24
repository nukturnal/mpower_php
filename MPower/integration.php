<?php
class MPower_Integration extends MPower {
  private static $masterKey;
  private static $privateKey;
  private static $publicKey;
  private static $token;

  public static $mode = "test";

  public static function setMasterKey($masterKey) {
    self::$masterKey = $masterKey;
  }

  public static function setPrivateKey($privateKey) {
    self::$privateKey = $privateKey;
  }

  public static function setPubicKey($publicKey) {
    self::$publicKey = $publicKey;
  }

  public static function setToken($token) {
    self::$token = $token;
  }

  public static function getMasterKey() {
    return self::$masterKey;
  }

  public static function getPrivateKey() {
    return self::$privateKey;
  }

  public static function getPubicKey() {
    return self::$publicKey;
  }

  public static function getToken() {
    return self::$token;
  }
}