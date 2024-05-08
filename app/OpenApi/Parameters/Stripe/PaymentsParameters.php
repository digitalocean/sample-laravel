<?php

namespace App\OpenApi\Parameters\Stripe;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class PaymentsParameters extends ParametersFactory
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

        ];
    }
}
