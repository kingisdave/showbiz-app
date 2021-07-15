<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    public function handlePayment(){
        $data = [];
        $data['product'] = [
          [
              'name' => 'Item One',
              'price' => 5,
              'description' => 'This is just to test the paypal',
              'quantity' => 2
          ]  
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('succeded');
        $data['cancel_url'] = route('cancelled');
        $data['total'] = 10;
  
        // $provider = new PayPalClient;

        $provider = new ExpressCheckout;
  
        // $response = $provider->setExpressCheckout($data);
        // $response = $provider->setPayPalClient($data);
  
        // $response = $provider->setExpressCheckout($data, true);
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);

    }

    public function cancelPayment(){
        dd('Sorry you payment is canceled');
    }

    public function paymentSuccess(Request $request){
        $provider = new ExpressCheckout; 
        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successful. You can create success page here.');
        }
  
        dd('Something is wrong.');
    }
}
