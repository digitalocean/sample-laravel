<?php

namespace App\OpenApi\Parameters;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class FaqParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [

            Parameter::query()
                ->name('question')
                ->description('faq question')
                ->required(true)
                ->schema(Schema::string()),

            Parameter::query()
                ->name('answer')
                ->description('faq question answers')
                ->required(true)
                ->schema(Schema::string()),

        ];
    }
}
