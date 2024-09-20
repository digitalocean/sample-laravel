<?php

namespace App\OpenApi\Parameters\Meals;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class CreateMealsParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [

            Parameter::query()
                ->name('Cusines')
                ->description('Meal name')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('Category')
                ->description('Meal Category')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('Calories')
                ->description('Meal calorie value')
                ->required(false)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('Description')
                ->description('Meal description')
                ->required(true)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('NutritionalValue')
                ->description('Meal combined nutritional value')
                ->required(false)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('MealType')
                ->description('Meal type of meal dinner, lunch, etc...')
                ->required(false)
                ->schema(Schema::string()),

        ];
    }
}
