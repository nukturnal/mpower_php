<?php
class MPower_Setup extends MPower {
  private static $masterKey;
  private static $privateKey;
  private static $publicKey;
  private static $token;

  const LIVE_CHECKOUT_INVOICE_BASE_URL = "https://app.mpowerpayments.com/api/v1/checkout-invoice/create";
  const TEST_CHECKOUT_INVOICE_BASE_URL = "https://app.mpowerpayments.com/sandbox-api/v1/checkout-invoice/create";
  const LIVE_CHECKOUT_CONFIRM_BASE_URL = "https://app.mpowerpayments.com/api/v1/checkout-invoice/confirm/";
  const TEST_CHECKOUT_CONFIRM_BASE_URL = "https://app.mpowerpayments.com/sandbox-api/v1/checkout-invoice/confirm/";

  private static $mode = "test";

  private function __construct(){}

  public static function setMasterKey($masterKey) {
    self::$masterKey = $masterKey;
  }

  public static function setPrivateKey($privateKey) {
    self::$privateKey = $privateKey;
  }

  public static function setPublicKey($publicKey) {
    self::$publicKey = $publicKey;
  }

  public static function setToken($token) {
    self::$token = $token;
  }

  public static function setMode($mode) {
    self::$mode = $mode;
  }

  public static function getMasterKey() {
    return self::$masterKey;
  }

  public static function getPrivateKey() {
    return self::$privateKey;
  }

  public static function getPublicKey() {
    return self::$publicKey;
  }

  public static function getToken() {
    return self::$token;
  }

  public static function getMode() {
    return self::$mode;
  }

  public static function getCheckoutConfirmUrl() {
    if (self::getMode() == "live") {
      return self::LIVE_CHECKOUT_CONFIRM_BASE_URL;
    }else{
      return self::TEST_CHECKOUT_CONFIRM_BASE_URL;
    }
  }

  public static function getCheckoutBaseUrl() {
    if (self::getMode() == "live") {
      return self::LIVE_CHECKOUT_INVOICE_BASE_URL;
    }else{
      return self::TEST_CHECKOUT_INVOICE_BASE_URL;
    }
  }
}