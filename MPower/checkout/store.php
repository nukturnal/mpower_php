<?php
class MPower_Checkout_Store extends MPower {
  public $name;
  public $tagline;
  public $postalAddress;
  public $phoneNumber;
  public $websiteUrl;
  public $logoUrl;

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
    return self::$name;
  }

  public static function getTagline() {
    return self::$tagline;
  }

  public static function getPostalAddress() {
    return self::$postalAddress;
  }

  public static function getPhoneNumber() {
    return self::$phoneNumber;
  }

  public static function getWebsiteUrl() {
    return self::$websiteUrl;
  }

  public static function getLogoUrl() {
    return self::$logoUrl;
  }
}