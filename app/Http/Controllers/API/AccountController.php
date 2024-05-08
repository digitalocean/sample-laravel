<?php

namespace App\Http\Controllers\API;

//use Illuminate\Http\JsonResponse;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use App\Models\Kiosk;
use App\Models\Order;
use App\OpenApi\Parameters\Accounts\AccountUsersParameters;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class AccountController extends BaseController {

    /**
     * Retrieves all Account Users.
     *
     * Returns Franchisee and Customer members and guest
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    public function index() {
        $accounts = Account::all();
        return $this->sendResponse(AccountResource::collection($accounts), 'Accounts retrieved successfully.');
    }

     /**
     * Retrieves franchisee Account user.
     *
     * Account will equal account id & 
     * Returns Franchisee account with Kiosk, Kiosk Orders, and available meals
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    public function franchiseAccount(Account $account) {
        $useraccount = Account::where('id', $account)->firstOrFail();
        $Kiosk = Kiosk::with('orders')->with('meals')->where('account_id', $useraccount)->get();
        $output = [
            'id' => $account->id,
            'Name' => $account->name,
            'WalletAmount' => $account->WalletAmout,
            'kiosk' => $Kiosk
        ];
        return $this->sendResponse($output, 'Franchisee Account retrieved successfully.');
    }

}
