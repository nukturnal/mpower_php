<?php
class MPower_Integration extends MPower {
  public static $masterKey;
  public static $privateKey;
  public static $publicKey;
  public static $token;

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
    self::$masterKey;
  }

  public static function getPrivateKey() {
    self::$privateKey;
  }

  public static function getPubicKey() {
    self::$publicKey;
  }

  public static function getToken() {
    self::$token;
  }
}

class MPower_Store extends MPower {
  public static $name;
  public static $tagline;
  public static $postalAddress;
  public static $phoneNumber;
  public static $websiteUrl;
  public static $logoUrl;

  public static function setName($name) {
    self::$name = $name;
  }

  public static function setTagline($tagline) {
    self::$tagline = $tagline;
  }

  public static function setPostalAddress($postalAddress) {
    self::$postalAddress = $postalAddress;
  }

  public static function setPhoneNumber($phoneNumber) {
    self::$phoneNumber = $phoneNumber;
  }

  public static function setWebsiteUrl($websiteUrl) {
    self::$websiteUrl = $websiteUrl;
  }

  public static function setLogoUrl($logoUrl) {
    self::$logoUrl = $logoUrl;
  }

  public static function getName() {
    self::$name;
  }

  public static function getTagline() {
    self::$tagline;
  }

  public static function getPostalAddress() {
    self::$postalAddress;
  }

  public static function getPhoneNumber() {
    self::$phoneNumber;
  }

  public static function getWebsiteUrl() {
    self::$websiteUrl;
  }

  public static function getLogoUrl() {
    self::$logoUrl;
  }
}