<?php
class MPower_Checkout_Invoice extends MPower_Checkout {
  const BASE_URL = "http://0.0.0.0:3000/checkout-invoice/create";
  public $items = array();
  public $total_amount = 0.0;
  public $taxes = array();
  public $description;
  public $currency = "ghs";
  public $cancel_url;
  public $return_url;
  private $invoice_url;

  function __construct(){
    $this->cancel_url = MPower_Checkout_Store::getCancelUrl();
    $this->return_url = MPower_Checkout_Store::getReturnUrl();
  }

  public function addItem($name,$quantity,$price,$totalPrice,$description="") {
    $this->items['item_'.count($this->items)] = array(
      'name' => $name,
      'quantity' => intval($quantity),
      'unit_price' => number_format($price,2),
      'total_price' => number_format($totalPrice,2),
      'description' => $description
    );
  }

  public function setTotalAmount($amount) {
    $this->total_amount = number_format($amount,2);
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
    $this->taxes['tax_'.count($this->taxes)] = array(
      'name' => $name,
      'amount' => $amount
    );
  }

  public function getInvoiceUrl() {
    return $this->invoice_url;
  }

  public function getItems() {
    return json_encode($this->items, JSON_FORCE_OBJECT);
  }

  public function getTaxes() {
    return json_encode($this->taxes, JSON_FORCE_OBJECT);
  }

  public function create() {
    $checkout_payload = array(
      'invoice' => array(
        'items' => $this->items,
        'taxes' => $this->taxes,
        'total_amount' => number_format($this->total_amount,2),
        'description' => $this->description
      ),
      'store' => array(
        'name' => MPower_Checkout_Store::getName(),
        'tagline' => MPower_Checkout_Store::getTagline(),
        'postal_address' => MPower_Checkout_Store::getPostalAddress(),
        'phone' => MPower_Checkout_Store::getPhoneNumber(),
        'logo_url' => MPower_Checkout_Store::getLogoUrl(),
        'website_url' => MPower_Checkout_Store::getWebsiteUrl()
      ),
      'actions' => array(
        'cancel_url' => $this->cancel_url,
        'return_url' => $this->return_url
      )
    );

    $result = MPower_Utilities::httpJsonRequest(self::BASE_URL,$checkout_payload);
    switch ($result["response_code"]) {
      case 00:
        $this->status = "success";
        $this->response_code = $result["response_code"];
        $this->response_text = $result["description"];
        $this->invoice_url = $result["response_text"];
        return true;
        break;
      default:
        $this->invoice_url = "";
        $this->status = "fail";
        $this->response_code = $result["response_code"];
        $this->response_text = $result["response_text"];
        return false;
        break;
    }
  }
}