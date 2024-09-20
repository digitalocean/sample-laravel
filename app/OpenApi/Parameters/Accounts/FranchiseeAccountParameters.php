<?php

namespace App\OpenApi\Parameters\Accounts;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class FranchiseeAccountParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [

            Parameter::query()
                ->name('Name')
                ->description('Parameter description')
                ->required(true)
                ->schema(Schema::string()),

            Parameter::query()
                ->name('email')
                ->description('Contact email address')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('Phone')
                ->description('Contact phone number')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('CompanyName')
                ->description('Company name')
                ->required(false)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('CompanuAddress')
                ->description('Address of company/client')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('City')
                ->description('current city of compnay/client')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('State')
                ->description('State residing')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('Zip')
                ->description('zipcode')
                ->required(true)
                ->schema(Schema::string()),
                

        ];
    }
}
