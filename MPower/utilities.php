<?php
class Utilities {

  // prevent instantiation of this class
  private function __construct() {}

  public static httpRequest(){
    Requests::register_autoloader();
  }
}