<?php

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

abstract class MPower {
  const VERSION = "0.0.1";
}

require_once("MPower/integration.php");
require_once("MPower/checkout.php");
require_once("MPower/checkout/store.php");
require_once("MPower/checkout/invoice.php");
require_once("MPower/libraries/Requests.php");
require_once("MPower/utilities.php");