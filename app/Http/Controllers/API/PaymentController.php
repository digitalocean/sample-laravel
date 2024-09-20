<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Account;
use App\Models\User;
use App\Models\Customer;
use Error;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;
use App\OpenApi\Parameters\Stripe\PaymentsParameters;
use App\OpenApi\Parameters\Stripe\MemberParameters;

#[OpenApi\PathItem]
class PaymentController extends BaseController {

    private function createPaymentMethod($token) {
        return \Stripe\PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'token' => $token,
            ],
        ]);
    }
    
    /**
     * Intiates Stripe Payment Intent.
     *
     * Stripe Payment intent & Returns clientSecert
     */
    #[OpenApi\Operation(tags: ['Payment Transaction'])]
    #[OpenApi\Parameters(factory: PaymentsParameters::class)]
    public function makePaymentIntent(Request $request) {
        /* Instantiate a Stripe Gateway either like this */
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $customer = Customer::where('email', $request->get('email'))->get();

        header('Content-Type: application/x-www-form-urlencoded');
          // check customers table by email return customerID
            // else null Create Customer with fullname, email,     
            if ($customer->isEmpty()) {
                $cust = $stripe->customers->create();
                $customer = $cust->id;
                Customer::create([
                    'fullname' => $request->get('fullname'),
                    'email' => $request->get('email'),
                    'balance' => 0,
                    'customerId' => $customer,
                ]);
                
                $customerID = $customer;

                try {
                    $ephemeralKey = $stripe->ephemeralKeys->create([
                        'customer' => $customerID,
                        ], [
                        'stripe_version' => '2022-08-01',
                    ]);
        
                    $paymentIntent = $stripe->paymentIntents->create([
                        // 'amount' => calculateOrderAmount($jsonObj->items),
                        'customer' => $customerID,
                        'amount' => $request->get('amount'),
                        'currency' => 'usd',
                        // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
                        'automatic_payment_methods' => [
                            'enabled' => true,
                        ],
                    ]);
                
                    $output = [
                        'clientSecret' => $paymentIntent->client_secret,
                        'ephemeralKey' => $ephemeralKey->secret,
                        'customer' => $customerID,
                    ];
                
                    echo json_encode($output);
                } catch (Error $e) {
                    http_response_code(500);
                    echo json_encode(['error' => $e->getMessage()]);
                }

            } else {
                $customerID = $customer[0]['customerId'];

                try {
                    $ephemeralKey = $stripe->ephemeralKeys->create([
                        'customer' => $customerID,
                        ], [
                        'stripe_version' => '2022-08-01',
                    ]);
        
                    $paymentIntent = $stripe->paymentIntents->create([
                        // 'amount' => calculateOrderAmount($jsonObj->items),
                        'customer' => $customerID,
                        'amount' => $request->get('amount'),
                        'currency' => 'usd',
                        // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
                        'automatic_payment_methods' => [
                            'enabled' => true,
                        ],
                    ]);
                
                    $output = [
                        'clientSecret' => $paymentIntent->client_secret,
                        'ephemeralKey' => $ephemeralKey->secret,
                        'customer' => $customerID,
                    ];
                
                    echo json_encode($output);
                } catch (Error $e) {
                    http_response_code(500);
                    echo json_encode(['error' => $e->getMessage()]);
                }
            }
        
    }

    /**
     * User Creates connect member account and makes payment.
     *
     * Returns clientSecert, empemeralKey, customer_id, 
     */
    #[OpenApi\Operation(tags: ['Payment Transaction'])]
    #[OpenApi\Parameters(factory: MemberParameters::class)]
    public function memberPayment(Request $request) {

        /* Instantiate a Stripe Gateway either like this */
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // Use an existing Customer ID if this is a returning customer.
        if ($request->get('customer_id') === 'null') {
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
            'amount' => $request->get('amount'),
            'currency' => 'usd',
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

     /**
     * User adds funds to wallet.
     *
     * Customer (Franchise or member) makes payemnt to stripe to add funds (account: 1d, amount: 10)
     */
    #[OpenApi\Operation(tags: ['Wallet Transaction'])]
    public function userAddFunds(Request $request) {
        // after stripe complets app sends information to 
        $account = Account::where('id', $request->get('account'))->get();
        $user = User::find($account[0]->user_id);
        $user->wallet->balance; // existing balnce
        $user->wallet->deposit(100);
        //$user->wallet->deposit(100, ['stripe_source' => $request->get('stripe_source'), 'description' => 'Deposit of 100 credits from Stripe Payment']);
        //$user->wallet->withdraw(10, ['description' => 'Purchase of Item #1234']);

        $output = [
            'balance' => $user->wallet->balance,
        ];

        echo json_encode($output);
    }
}
