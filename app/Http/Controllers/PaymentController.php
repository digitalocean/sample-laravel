<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Stripe\Stripe;
use App\Services\StripeService;
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

    public function processPayment(Request $request) {
        $request->validate([
            'token' => 'required',
        ]);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        // Create a customer
        $customer = \Stripe\Customer::create();

        // Attach the payment method to the customer
        $paymentMethod = $this->createPaymentMethod($request->token);
        $paymentMethod->attach(['customer' => $customer->id]);

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
        $clientSecret = $paymentIntent->client_secret;

        return response()->json(['client_secret' => $clientSecret]);
    }
}
