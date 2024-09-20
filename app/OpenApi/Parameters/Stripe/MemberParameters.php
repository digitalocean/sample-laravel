<?php

namespace App\OpenApi\Parameters\Stripe;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class MemberParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [

            Parameter::query()
                ->name('amount')
                ->description('total price of product')
                ->required(true)
                ->schema(Schema::string()),

            Parameter::query()
                ->name('customer_id')
                ->description('if exising member if not customer_id = null')
                ->required(true)
                ->schema(Schema::string()),
        ];
    }
}
