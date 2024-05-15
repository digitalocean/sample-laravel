<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Meal;
use App\OpenApi\Parameters\Meals\CreateMealsParameters;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class MealsController extends BaseController {
    //
    /**
     * Retrieves all Meals.
     *
     * Returns meals
     */
    #[OpenApi\Operation(tags: ['Meals'])]
    public function meals(){
        $meal = Meal::get();

        $output = [
            'meals' => $meal,
        ];

        return $this->sendResponse($output, 'Success all meals returned');
    }

    /**
     * Retrieves all Meals.
     *
     * Returns meals
     */
    #[OpenApi\Operation(tags: ['Meals'])]
    #[OpenApi\Parameters(factory: CreateMealsParameters::class)]
    public function createMeals(Request $request){
        $request->validate([
            'Cuisine' => 'required|string|max:255',
            'Category' => 'required|string|max:255',
            'Calories' => 'required|string|max:10',
            'Description' => 'required|string|max:255',
            'NutritionalValue' => 'required|string|max:10',
            'MealType' => 'required|string|max:255', 
        ]);

        $meal = Meal::create([
            'Cuisine' => $request->Cusine,
            'Category' => $request->Category,
            'Calories' => $request->Calorie,
            'Description' => $request->Description,
            'NutritionalValue' => $request->NutritionalValue,
            'MealType' => $request->MealType,
        ]);

        $success['token'] =  $meal->Cuisine;
        return $this->sendResponse($success, 'User registered successfully.');
    }


}
