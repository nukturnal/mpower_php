# MpowerPHP
==========

MPower Payments PHP Client Library

## Installation

Require Mpower PHP library

    require 'mpower/mpower.php'

## Setup your API Keys

    MPower_Setup::setMasterKey("3b8cfee0-f057-012f-b6c6-0026bb034858");
    MPower_Setup::setPublicKey("test_public_H7qP-8OebRIXxLP6TDzx9H2QN-E");
    MPower_Setup::setPrivateKey("test_private_LdA96IPb58stYRFaIAbMlY-QwJE");
    MPower_Setup::setMode("test");
    MPower_Setup::setToken("fb008051e7e5a819b8a6");

## Create your Checkout Invoice

    $co = new MPower_Checkout_Invoice();
    $co->addItem("13' Apple Retina 500 HDD",1,999.99,999.99);
    $co->addItem("Case Logic laptop Bag",2,100.50,201);
    $co->addItem("Mordecai's Bag",2,100.50,400);

## Set the total amount to be charged ! Important

    $co->setTotalAmount(1200.99);

## Setup Tax Information (Optional)

    $co->addTax("VAT (15)",50);
    $co->addTax("NHIL (10)",50);

## You can add custom data to your invoice which can be called back later

    $co->setCustomData("Firstname","Alfred");
    $co->setCustomData("Lastname","Rowe");
    $co->setCustomData("CartId",929292872);

## Redirecting to your checkout invoice page

    if($co->create()) {
       header("Location: ".$co->getInvoiceUrl());
    }else{
      echo $co->response_text;
    }

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request