<?php
require_once("mpower/dependency_check.php");

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

abstract class MPower {
  const VERSION = "1.2.0";
}

if (strnatcmp(phpversion(),'5.3.0') >= 0) {
  define('JSON_ENCODE_PARAM_SUPPORT',   true);
}else{
  define('JSON_ENCODE_PARAM_SUPPORT',   false);
}

require_once("mpower/setup.php");
require_once("mpower/customdata.php");
require_once("mpower/checkout.php");
require_once("mpower/checkout/store.php");
require_once("mpower/checkout/checkout_invoice.php");
require_once("mpower/checkout/onsite_invoice.php");
require_once("mpower/direct_pay.php");
require_once("mpower/direct_card.php");
require_once("mpower/libraries/Requests.php");
require_once("mpower/utilities.php");