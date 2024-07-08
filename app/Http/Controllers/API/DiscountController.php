<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Kiosk;
use Faker\Provider\Base;
use Vyuldashev\LaravelOpenApi\Attributes as OpemAPI;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Str;

class DiscountController extends BaseController {

    // Create Discount
    public function createDiscount(Request $request) {
        $request->validate([
            'discountName' => 'required|string|max:150',
            'startDate' => 'required|string',
            'endDate' => 'required|string',
        ]);

        $code = Str::random(8);
        
        $discount = Discount::create([
            'discountName' => $request->discountName,
            'discountDescription' => $request->discountDescription,
            'discount' => $request->discount,
            'code' => 'Hc-',$code,
            'Status' => 'review',
            'zipcode' => '',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ]);

        $output = [
            'discount' => $discount->code,
        ];

        return $this->sendResponse($output, 'Discount successfully sent to Homechow');  

    }

    // update Discount

    // Get all discounts

    // Get all discounts by zipcode area

}
