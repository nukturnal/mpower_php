<?php
require_once("mpower/dependency_check.php");

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

abstract class MPower {
  const VERSION = "0.0.1";
}

require_once("mpower/setup.php");
require_once("mpower/customdata.php");
require_once("mpower/checkout.php");
require_once("mpower/checkout/store.php");
require_once("mpower/checkout/invoice.php");
require_once("mpower/libraries/Requests.php");
require_once("mpower/utilities.php");