<?php

namespace App\OpenApi\Parameters\Accounts;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class AccountUsersParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [

            Parameter::query()
                ->name('account')
                ->description('User Account $id')
                ->required(true)
                ->schema(Schema::string()),

        ];
    }
}
