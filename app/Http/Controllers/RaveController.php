<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use the Rave Facade
use Rave;
use Log;

class RaveController extends Controller
{

  /**
   * Initialize Rave payment process
   * @return void
   */
  public function initialize()
  {
    //This initializes payment and redirects to the payment gateway
    //The initialize method takes the parameter of the redirect URL
    Rave::initialize(route('callback'));
  }

  /**
   * Obtain Rave callback information
   * @return void
   */
  public function callback()
  {

    $data = Rave::verifyTransaction(request()->txref);
	//$context = $this->getContext();

	//dd($data);
    Log::info($data);
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Comfirm that the transaction is successful
        // Confirm that the chargecode is 00 or 0
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here
	//$chargeResponsecode = $data->data->chargecode;
    //$chargeAmount = $data->data->amount;
    //$chargeCurrency = $data->data->currency;
	//$orderID = $data->data->orderId;
    
    //$amount = 4500;
    //$currency = "KES";
	//Log::info($orderId.' '.$chargeResponse);
	$context = app('aimeos.context')->get();
	$domains = ['order/base', 'order/base/address', 'order/base/coupon', 'order/base/product', 'order/base/service'];
	$orderId = $context->getSession()->get( 'aimeos/orderid' );
	$order = \Aimeos\MShop::create($context, 'order')->get($orderId, $domains);
	$order->setPaymentStatus( \Aimeos\MShop\Order\Item\Base::PAY_AUTHORIZED );
	return redirect ('/success');
	/**
    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency) {
    // transaction was successful...
    // please check other things like whether you already gave value for this ref
    // if the email matches the customer who owns the product etc
    //Give Value and return to Success page
	$orderId = $context->getSession()->get( 'aimeos/orderid' );
	Log::info($orderId);
	$manager = \Aimeos\MShop\Factory::createManager( $context, 'order' );
	$order = $manager->getItem( $orderId );
	$order->setPaymentStatus( \Aimeos\MShop\Order\Item\Base::PAY_AUTHORIZED );
    return redirect('/my-notification');
    
    } else {
        //Dont Give Value and return to Failure page
		$order->setPaymentStatus( \Aimeos\MShop\Order\Item\Base::PAY_CANCELED );
        return redirect('/failed');
    }
	***/
  }
  
  /**
   * Receives Rave webhook
   * @return void
   */
  public function webhook()
  {
    //This receives the webhook
    $data = Rave::receiveWebhook();
    Log::info(json_encode($data, true));
  }
}