<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use App\Models\Kiosk;
use App\Models\Order;
use App\Models\User;
use App\OpenApi\Parameters\Accounts\FranchiseeAccountParameters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class AccountController extends BaseController {

    /**
     * Create Franchisee Account.
     *
     * request needs (Name, email, phone, Address, city, zipCode, country)
     * returns accountId for kiosk linking
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    #[OpenApi\Parameters(factory: FranchiseeAccountParameters::class)]
    public function createFranchisee(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
        ]);

        $account = Account::create([
            'Name' => $request->name,
            'user_id' => $user->id,
            'Phone' => $request->Phone,
            'CompanyName' => $request->CompanyName,
            'CompanyAddress' => $request->CompanyAddress,
            'WalletAmount' => '0',
            'City' => $request->City,
            'State' => $request->State,
            'Zip' => $request->Zip,
            'Status' => 'inactive',
            'type' => 'franchisee'
        ]);

        $acctId = $account;

        $output = [
            'account' => $acctId,
        ];

        return $this->sendResponse($output, 'Orders retrieved successfully.'); 
    }

    /**
     * Retrieves all Account Users.
     *
     * Returns Franchisee and Customer members and guest grouped by Member Type
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    public function index() {
        $account = Account::all();
        $accounts = $account->groupBy('Type');
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
        // to count and group ordres
        $countMeals = Order::where('kiosk_id', $Kiosk->id)->countBy('MealName');
        if($countMeals->empty){
            $TransactionTotal = '0';
            $TopSelling = '0';
        } else {
            $TransactionTotal = $Kiosk['orders']->count();
            $TopSelling = $countMeals;
        }
        $output = [
            'id' => $account->id,
            'Name' => $account->name,
            'WalletAmount' => $account->WalletAmout,
            'kiosk' => $Kiosk,
            'TopSelling' => $TopSelling,
            'TransactionTotal' => $TransactionTotal,
        ];
        return $this->sendResponse($output, 'Franchisee Account retrieved successfully.');
    }

    /**
     * Retrieves franchisee Kiosk Products.
     *
     * Account will equal account id & 
     * Returns Franchisee Kiosk Products / Meals
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    public function franchiseeProducts(Account $account) {
        $useraccount = Account::where('id', $account)->firstOrFail();
        $Kiosk = Kiosk::with('meals')->where('account_id', $useraccount)->get();
        $output = [
            'Products' => $Kiosk,
        ];
        return $this->sendResponse($output, 'Franchisee Account retrieved successfully.');
    }

    /**
     * Retrieves franchisee Profile.
     *
     * Account will equal account id & 
     * Returns Franchisee Kiosk 
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    public function franchiseeProfile(Account $account) {
        $useraccount = Account::where('id', $account)->with('kiosks')->firstOrFail();

        $output = [
            'profile' => $useraccount,
        ];
        
        return $this->sendResponse($output, 'Franchisee Account retrieved successfully.');
    }

}
