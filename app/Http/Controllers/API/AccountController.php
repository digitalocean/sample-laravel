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
    // Kiosk::factory()->hasOrders(5)->hasMeals(6)->create();
   #[OpenApi\Operation(tags: ['accounts'])]
    public function franchiseAccount(Account $account) {
        $acct = $account;
        $useraccount = Account::where('id', $acct->id)->get();
        $ordersK = Kiosk::with('orders')->with('meals')->where('account_id', $account->id)->get();
        $countMeals = Order::where('account_id', $acct->id)->get();
            if($countMeals->isEmpty()){
                $TransactionTotal = '0';
                $TopSelling = '0';
            } else {
                $TransactionTotal = $countMeals->count();
                $TopSelling = $countMeals->countBy('MealName');
            }
            $output = [
                'account' => AccountResource::collection($useraccount),
                'kiosk' => $ordersK,
                'TopSelling' => $TopSelling,
                'TransactionTotal' => $TransactionTotal,
            ];
        // to count and group ordres
        
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
        $acct = $account;
        $useraccount = Account::where('id', $account)->get();
        $Kiosk = Kiosk::with('meals')->where('account_id', $acct->id)->get();
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
        $acct = $account;
        $useraccount = Account::where('id', $acct->id)->get();
        $kiosk = Kiosk::where('Account_id', $acct->id)->get();

        $output = [
            'profile' => $useraccount,
            'kiosk' => $kiosk,
        ];
        
        return $this->sendResponse($output, 'Franchisee Account retrieved successfully.');
    }

}
