<?php

namespace App\Http\Controllers\Frontend;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Braintree_Transaction;
use Braintree_Customer;
use Braintree_WebhookNotification;
use Braintree_Subscription;
use Braintree_CreditCard;

class BraintreeController extends Controller
{
  public function __construct() {

  }

  public function addOrder()
  {
      $input = Input::all();
      // dd($input);
      $subscribed= false;
      if(isset($input['subscribed']))
      {
        $subscribed= true;
      }
      $customer_id = $this->registerUserOnBrainTree();
      echo 'customer id - '.$customer_id;/// Create card token
      $card_token = $this->getCardToken($customer_id,$input['cardNumber'],$input['cardExpiry'],$input['cardCVC']);
      echo 'card_token - '.$card_token;
      /// gateway will provide this plan id whenever you creat plans there
      $plan_id = '4d8m';
      $transction_id = $this->createTransaction($card_token,$customer_id,$plan_id,$subscribed);
      // dd($transction_id);

      if(strlen($transction_id) >=1){
        \Session::put('transaction_id', $transction_id);
        return redirect('finish-payment');
      }else{
        \Session::flash('message','Your transaction failed, try again, chek your card number, card expiry and card cvc number');
        return redirect('pay-with-braintree');
      }

  }


  public function registerUserOnBrainTree() {
      $user = \App\User::where('id', '=', Auth::guard('user')->id)->first();
       $result = Braintree_Customer::create(array(


        'firstName' => $user->fullname,
        'lastName' => $user->fullname,
        'email' => $user->email,
        'phone' => $user->phone
      ));
      if ($result->success) {
          return $result->customer->id;
      } else {
          $errorFound = '';
      foreach ($result->errors->deepAll() as $error) {
          $errorFound .= $error->message . "<br />";
      }
          echo $errorFound ;
      }
  }


  public function getCardToken($customer_id,$cardNumber,$cardExpiry,$cardCVC)
  {
      $card_result = Braintree_CreditCard::create(array(
          //'cardholderName' => mysql_real_escape_string($_POST['full_name']),
          'number' => $cardNumber,
          'expirationDate' => trim($cardExpiry),
          'customerId' => $customer_id,
          'cvv' => $cardCVC
        ));
      if($card_result->success)
      {
          return $card_result->creditCard->token;
      }
      else {
          return false;

      }
  }


  public function createTransaction($creditCardToken,$customerId,$planId,$subscribed){
      if($subscribed)
      {
          $subscriptionData = array(
            'paymentMethodToken' => $creditCardToken,
            'planId' => '4d8m'
          );
          $this->cancelSubscription();
          $subscription_result = Braintree_Subscription::create($subscriptionData);
          echo 'Subscription id'. $subscription_result->subscription->id;
      }
      else {
          $this->cancelSubscription();
      }
          $order_no = rand();
          \Session::put('order_no', $order_no);
          $result = Braintree_Transaction::sale(
          [
            'customerId' => $customerId,
            'amount' => \Session::get('grand_total'),
            'orderId' => $order_no
          ]


      );
        if ($result->success) {
          return $result->transaction->id;
          // return redirect('shop/finish-payment');
        } else {
          $errorFound = '';
          foreach ($result->errors->deepAll() as $error1) {
          $errorFound .= $error1->message . "<br />";
        }
      }
  }


  public function cancelSubscription()
  {
    $gateway_subscription_id = '';
    if($gateway_subscription_id!='')
    {
      Braintree_Subscription::cancel($gateway_subscription_id);
    }
  }


  //// for subscription Braintree_WebhookNotification
  public function subscription()
  {
    try{
        if(isset($_POST["bt_signature"]) && isset($_POST["bt_payload"])) {
          $webhookNotification = Braintree_WebhookNotification::parse(
              $_POST["bt_signature"], $_POST["bt_payload"]
          );// $message =
          // "[Webhook Received " . $webhookNotification->timestamp->format('Y-m-d H:i:s') . "] "
          // . "Kind: " . $webhookNotification->kind . " | "
          // . "Subscription: " . $webhookNotification->subscription->id . "\n";Log::info("msg " . Log::info("subscription " . json_encode($webhookNotification->subscription));
          Log::info("transactions " . json_encode($webhookNotification->subscription->transactions));
          Log::info("transactions_id " . json_encode($webhookNotification->subscription->transactions[0]->id));
          Log::info("customer_id " . json_encode($webhookNotification->subscription->transactions[0]->customerDetails->id));
          Log::info("amount " . json_encode($webhookNotification->subscription->transactions[0]->amount));
        }
    }
    catch (\Exception $ex) {
      Log::error("PaymentController::subscription() " . $ex->getMessage());
    }
  }
}
