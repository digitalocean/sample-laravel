<?php

namespace App\OpenApi\Parameters\Kiosk;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class CreateKioskParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [

            Parameter::query()
                ->name('Account_id')
                ->description('Franchisee account ID')
                ->required(true)
                ->schema(Schema::string()),
            
                Parameter::query()
                ->name('KioskType')
                ->description('Small or Large kiosk')
                ->required(true)
                ->schema(Schema::string()),

            Parameter::query()
                ->name('KioskNumber')
                ->description('Assigned number to kiosk for reference')
                ->required(true)
                ->schema(Schema::string()),
        ];
    }
}
