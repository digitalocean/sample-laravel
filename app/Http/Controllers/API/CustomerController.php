<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Account;
use App\Models\Application;
use App\Models\Customer;
use GuzzleHttp\Promise\Create;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

class CustomerController extends BaseController
{
    /**
     * All User Accounts transactions.
     *
     * Returns Customer members and guest transaction details with Totals (User, Order, Sales, Pending)
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    public function customerTransactions(){
        // get all transactions by account
        // total Accounts
        // total Orders
        // total sales
        // total Pending status
        $output = [

        ];
        return $this->sendResponse($output, 'Franchisee Account retrieved successfully.');
    }

    /**
     * Submitted Application.
     *
     * Returns application submitted
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    public function franchiseeApplication(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255',
        ]);

        $submit = Application::Create([
            'Name' => $request->name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Location' => $request->location,
            'Status' => 'submitted',
        ]);

        $output = [
            'application' => $submit,
        ];

        return $this->sendResponse($output, 'Application submitted succesfully.'); 
    }

}
