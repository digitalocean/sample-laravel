<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Charges;
use App\Models\Customer;
use Error;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;
use App\OpenApi\Parameters\Stripe\PaymentsParameters;
use App\OpenApi\Parameters\Stripe\MemberParameters;


class ChargesController extends BaseController {


    /**
     * Stripe Charges.
     *
     * Stripe Payment charges returns per customer
     * Homechow Saves 3days of stripe charges
     */
    #[OpenApi\Operation(tags: ['Payment Transaction'])]
    #[OpenApi\Parameters(factory: PaymentsParameters::class)]
    public function updateCustomer() {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        
        $charges = $stripe->charges->all(['limit' => 3]);

        $output = [
            'charges' => $charges,
        ];

        return $this->sendResponse($output, 'New current charges retrieve succesfully.');
    }
}
