<?php

namespace App\Http\Controllers\API;

//use Illuminate\Http\JsonResponse;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use App\Models\Kiosk;
use App\Models\Order;
use Illuminate\Http\Request;

class AccountController extends BaseController {

    public function index() {
        $accounts = Account::all();
        return $this->sendResponse(AccountResource::collection($accounts), 'Accounts retrieved successfully.');
    }

    // get franchisee account
    public function franchiseAccount($id) {
        $account = Account::where('id', $id)->firstOrFail();
        $Kiosk = Kiosk::with('orders')->where('account_id', $id)->get();
        $output = [
            'id' => $account->id,
            'Name' => $account->name,
            'WalletAmount' => $account->WalletAmout,
            'kiosk' => $Kiosk
        ];
        return $this->sendResponse($output, 'Franchisee Account retrieved successfully.');
    }

    public function franchiseeKiosk($id) {
        $Kiosk = Kiosk::where('account_id', $id)->get();
        $output = [
            'kiosk' => $Kiosk,
        ];
        return $this->sendResponse($output, 'kiosj retrieved successfully');
    }

}