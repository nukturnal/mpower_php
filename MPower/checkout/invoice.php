<?php
class MPower_Checkout_Invoice extends MPower_Checkout {
  const BASE_URL = "http://0.0.0.0:3000/co-invoice";
  public $items = array();
  public $total_amount = 0.0;
  public $taxes = array();
  public $description;
  public $currency = "ghs";
  public $store;
  public $cancel_url;
  public $return_url;
  public $invoice_url;

  function __construct(){
    $this->store = new MPower_Checkout_Store();
  }

  public function addItem($name,$quantity,$price,$totalPrice,$description="") {
    $this->items[] = array(
      'name' => $name,
      'quantity' => $quantity,
      'price' => $price,
      'totalPrice' => $totalPrice,
      'description' => $description
    );
  }

  public function setTotalAmount($amount) {
    $this->total_amount = round($amount,2);
  }

  public function setCancelUrl($url) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
      $this->cancel_url = $url;
    }
  }

  public function setReturnUrl($url) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
      $this->return_url = $url;
    }
  }

  public function addTax($name,$amount) {
    array_push($this->taxes, array('tax_'.count($this->taxes) => array(
          'name' => $name,
          'amount' => $amount
        )
      )
    );
  }

  public function getItems() {
    return json_encode($this->items);
  }

  public function getTaxes() {
    return json_encode($this->taxes);
  }

  public function create() {
    $checkout_payload = array(
      'invoice' => array(
        'items' => $this->items,
        'taxes' => $this->taxes,
        'total_amount' => round($this->total_amount,2),
        'description' => $this->description
      ),
      'store' => array(
        'name' => $this->store->name,
        'tagline' => $this->store->tagline,
        'postal_address' => $this->store->postal_address,
        'phone' => $this->store->phone_number,
        'logo_url' => $this->store->logo_url,
        'website_url' => $this->store->website_url
      ),
      'actions' => array(
        'cancel_url' => $this->cancel_url,
        'return_url' => $this->return_url
      )
    );

    $result = MPower_Utilities::httpRequest(self::BASE_URL,$checkout_payload);
    return $result;
  }
}