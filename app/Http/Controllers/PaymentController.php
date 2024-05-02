<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Stripe\Stripe;
use Error;

class PaymentController extends Controller {

    private function createPaymentMethod($token) {
        return \Stripe\PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'token' => $token,
            ],
        ]);
    }
    
    // Guest Created one-time payment
    public function makePaymentIntent(Request $request) {
        /* Instantiate a Stripe Gateway either like this */
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    
        header('Content-Type: application/json');

        try {
            
            $paymentIntent = $stripe->paymentIntents->create([
                // 'amount' => calculateOrderAmount($jsonObj->items),
                'amount' => $request->get('amount'),
                'currency' => 'usd',
                // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
        
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
        
            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function memberPayment(Request $request) {

        /* Instantiate a Stripe Gateway either like this */
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // Use an existing Customer ID if this is a returning customer.
        if ($request->get('customer_id') == 'null') {
            $cust = $stripe->customers->create();
            $customer = $cust->id;
        } else {
            $customer = $request->get('customer_id');
        }

        $ephemeralKey = $stripe->ephemeralKeys->create([
            'customer' => $customer,
            ], [
            'stripe_version' => '2022-08-01',
        ]);
        
        $paymentIntent = $stripe->setupIntents->create([
            'customer' => $customer,
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
            'ephemeralKey' => $ephemeralKey->secret,
            'customer' => $customer,
        ];

        echo json_encode($output);
    }

    // Member created purchase
    public function processPayment(Request $request) {
        
        $request->validate([
            'token' => 'required',
        ]);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        // Create a customer 
        // if customer is customer_id is null
        $customer = \Stripe\Customer::create();

        // Attach the payment method to the customer
        $paymentMethod = $this->createPaymentMethod($request->token);
        $paymentMethod->attach(['customer' => $customer->id]);

        try {
        // Create a PaymentIntent with the customer and payment method
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => 1000, // Amount in cents
            'currency' => 'usd',
            'customer' => $customer->id,
            'payment_method' => $paymentMethod->id,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);

        // Retrieve the client secret
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
                'customer' => $customer->id,
            ];

            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
        // return response()->json(['client_secret' => $clientSecret]);
    }
}
