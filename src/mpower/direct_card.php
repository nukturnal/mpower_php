<?php
class MPower_DirectCard extends MPower_Checkout {
  public $unity_transaction_id;

  public function charge($amount, $card_name, $card_number, $card_cvc, $exp_month, $exp_year)
  {
    $payload = array(
      'card_name' => $card_name,
      'card_number' => $card_number,
      'card_cvc' => $card_cvc,
      'exp_month' => $exp_month,
      'exp_year' => $exp_year,
      'amount' => $amount
    );
    
    $result = MPower_Utilities::httpJsonRequest(MPower_Setup::getDirectCreditcardChargeUrl(), $payload);
    if(count($result) > 0) {
      switch ($result['response_code']) {
        case 00:
          $this->status = $result['status'];
          $this->response_text = $result["response_text"];
          $this->description = $result["description"];
          $this->transaction_id = $result["transaction_id"];
          $this->unity_transaction_id = $result["unity_transaction_id"];
          return true;
          break;
        default:
          $this->status = $result['status'];
          $this->response_text = $result["response_text"];
          $this->response_code = $result["response_code"];
          return false;
      }
    }else{
      $this->status = "fail";
      $this->response_code = 4002;
      $this->response_text = "An Unknown MPower Server Error Occured.";
      return false;
    }
  }
}