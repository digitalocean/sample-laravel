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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
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
     * Update Franchisee Account.
     *
     * request needs (Name, email, phone, Address, city, zipCode, country)
     * returns accountId for kiosk linking
     */
    #[OpenApi\Operation(tags: ['accounts'])]
    #[OpenApi\Parameters(factory: FranchiseeAccountParameters::class)]
    public function updateFranchisee(Request $request, Account $account) {
        
        $request->validate([
            'email' => 'string|lowercase|email|max:255',
            'name' => 'string|max:150',
            'phone' => 'string|max:150',
            'image' => 'mimes:jpg,bmp,png|max:250',
        ]);
        $id = $account->id;
        $account = Account::find($id);
        if($request->name != ''){$account->Name = $request->name;}
        if($request->phone != ''){$account->Phone = $request->phone;}
        if($request->email != ''){$account->email = $request->email;}
        if($request->image != ''){$account->image = $request->image;}
        $account->save();

        if($request->email != '') {
            $user = User::where('id', $account->user_id)->get();
            $u = $user[0]->id;
            $changeEmail = User::find($u);
            $changeEmail->email = $request->email;
            $changeEmail->save();
        }

        $acctId = $account;
        $output = [
            'pin' => $acctId->pin,
        ];

        return $this->sendResponse($output, 'Pin updated successfully.'); 
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

    // kiosk total sales by day, 7day, month, all
    public function kioskSales(Account $account) {
        $acct = $account;
        // all kiosk associated
        $all = DB::table('kiosks')->where("Account_id", $acct)
            ->join('orders', 'kiosks.id', '=', 'orders.kiosk_id')
            ->select('kiosks.KioskNumber', 'kiosks.Account_id', 'orders.Account_id', 'orders.id', 'orders.OrderNumber', 'orders.MealName', 'orders.Category','orders.Amount', 'orders.ProductID', 'orders.Quantity', 'orders.created_at')
            ->get();

        $Kiosk = $all->groupBy('KioskNumber');


        $TopSellingCategory = [];
        foreach( $Kiosk as $i ){
            $a = $i->groupBy('KioskNumber');
            // $TopSellingCategory[] = $i->groupBy('Category');
            $MealsRanking = $i->countBy('Category');
            $TopSellingCategory[] = Arr::add(['Kiosk' => $a, 'topcategories' => null], 'topcategories', $MealsRanking);
        }
        
        // $TopSellingCategory = [];
        $SalesByDate = [];
        foreach( $Kiosk as $i ){
            $SalesByDate[] = $i->groupBy('created_at');
            $MealsRanking = $i->countBy('Category');
            $SalesByDate[] = Arr::add(['topcategories' => null], 'topcategories', $MealsRanking);//change is made here use array to store all values 
        }

      

        $output = [
            'SalesByKiosk' => $Kiosk,
            'TopSellingKioskCategory' => $TopSellingCategory,
            'SalesByDate' => $SalesByDate,
            // 'MealsRanking' => $MealsRanking,

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

    public function createAccountPin(Request $request, Account $account) {
        $acct  = $account;
        $request->validate([
            'pin' => 'required|string|max:6',
            'pinConfirmation' => 'required|string|max:6'
        ]);
        $newpin =  $request->pin;
        $pinConfirmation = $request->pinConfirmation;

        if( $newpin === $pinConfirmation) {
            
            $pinInsert = Account::find($acct->id); 
            $pinInsert->pin = $request->pin;
            $pinInsert->save();

            $output = [
                'pin' => $pinInsert->pin,
            ];
    
            return $this->sendResponse($output, 'Pin created successfully.');
       
        } else {

            $output = [
                'pin' => 'Error',
            ];
    
            return $this->sendResponse($output, 'Confirmation does not match');
        }
    }

    public function verifyPin(Request $request, Account $account) {
        $acct  = $account;
        $request->validate([
            'pin' => 'required|string|max:6',
        ]);
        $newpin =  $request->pin;
        $pinaccount = Account::where('id', $acct->id)->get();

        if( $newpin === $pinaccount[0]['pin']) {
            $output = [
                'pin' => 'Confirmend',
            ];
            return $this->sendResponse($output, 'Pin Confirmned successfully.');       
        } else {

            $output = [
                'pin' => 'Error',
            ];

            return $this->sendResponse($output, 'Confirmation does not match');
        }

        $output = [
            'pin' => $pinaccount,
        ];

        return $this->sendResponse($output, 'Pin created retrieved successfully.');
    }

}
