<?php

namespace App\Http\Controllers\APi;

//use Illuminate\Http\JsonResponse;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
    public function index() {
        $accounts = Account::all();

        return $this->sendResponse(AccountResource::collection($accounts), 'Accounts retrieved successfully.');
    }
}