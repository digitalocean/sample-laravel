<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends BaseController {
    //
    public function index(){
        $categories = Category::select('id', 'Name')->get();

        $output = [
            'categories' => $categories
        ];

        return $this->sendResponse($output, 'Categories list retrieve succesfully.');
    }
}
