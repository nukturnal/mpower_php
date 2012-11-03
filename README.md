# MpowerPHP
==========

MPower Payments PHP Client Library

## Installation

Require Mpower PHP library

    require 'mpower/mpower.php'

## Setup your API Keys

    MPower_Setup::setMasterKey(YOUR_API_MASTER_KEY);
    MPower_Setup::setPublicKey(YOUR_API_PUBLIC_KEY);
    MPower_Setup::setPrivateKey(YOUR_API_PRIVATE_KEY);
    MPower_Setup::setMode(["test"|"live"]);
    MPower_Setup::setToken(YOUR_API_TOKEN);

## Setup your checkout store information

    MPower_Checkout_Store::setName("My Awesome Online Store");
    MPower_Checkout_Store::setTagline("My awesome store's awesome tagline");
    MPower_Checkout_Store::setPhoneNumber(STORE_PHONENO);
    MPower_Checkout_Store::setPostalAddress(STORE_ADDRESS);

Customer will be redirected back to this URL when he cancels the checkout on MPower website

    MPower_Checkout_Store::setCancelUrl(CHECKOUT_CANCEL_URL);

MPower will automatically redirect customer to this URL after successfull payment.
This setup is optional and highly recommended you dont set it, unless you want to customize the payment experience of your customers.
When a returnURL is not set, MPower will redirect the customer to the receipt page.

    MPower_Checkout_Store::setReturnUrl(CHECKOUT_RETURN_URL);

## Create your Checkout Invoice

    $co = new MPower_Checkout_Invoice();

Params for addItem function `addItem(name_of_item,quantity,unit_price,total_price)`

    $co->addItem("13' Apple Retina 500 HDD",1,999.99,999.99);
    $co->addItem("Case Logic laptop Bag",2,100.50,201);
    $co->addItem("Mordecai's Bag",2,100.50,400);

## Set the total amount to be charged ! Important

    $co->setTotalAmount(1200.99);

## Setup Tax Information (Optional)

    $co->addTax("VAT (15)",50);
    $co->addTax("NHIL (10)",50);

## You can add custom data to your invoice which can be called back later

    $co->addCustomData("Firstname","Alfred");
    $co->addCustomData("Lastname","Rowe");
    $co->addCustomData("CartId",929292872);

## Redirecting to your checkout invoice page

    if($co->create()) {
       header("Location: ".$co->getInvoiceUrl());
    }else{
      echo $co->response_text;
    }

## Download MPower PHP Demo Store
https://github.com/nukturnal/MPower_PHP_Demo_Store

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request