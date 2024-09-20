<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Account;
use App\Http\Controllers\API\BaseController as BaseController;
use Vyuldashev\LaravelOpenApi\Attributes as OpenAPI;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;



#[OpenApi\PathItem]
class OrdersController extends BaseController
{
     /**
     * Retrieves all Orders.
     *
     * All Orders with attached kiosk
     */
    #[OpenApi\Operation(tags: ['Orders'])]
    public function orders(){
        $orders = Order::with('kiosks')->get();

        $output = [
            'orders' => $orders,
        ];
        return $this->sendResponse($output, 'Orders retrieved successfully.');         

    }

    /**
     * Retrieves Individual Order.
     *
     * Returns order by order number
     */
    #[OpenApi\Operation(tags: ['Orders'])]
    public function orderNumber(Order $order){

        $order = Order::where('OrderNumber', $order)->with('kiosks')->get();

        $output = [
            'orders' => $order,
        ];
        return $this->sendResponse($output, 'Order retrieved successfully.');

    }

    public function orderReports(Account $account) {
        $acct = $account;
        $today = Carbon::now();
        $yesterday = Carbon::now()->subDays(1); 
        $week = Carbon::now()->subDays(7); 
        $from = Carbon::now()->startOfMonth();
        $to = Carbon::now()->endOfMonth();
        
        $all = Order::where('Account_id', $acct->id)
            ->select('kioskName', 'MealName', 'Category', 'Amount', 'Discount', 'ProductID', 'Time', 'Quantity' )
            ->where('PaymentStatus', 'Paid')
            ->get();

        $kioskGroup = $all->groupBy('kioskName');

        $todaySales = [];
        foreach( $kioskGroup as $y ) {
            $a = $y[0]['kioskName'];
            $b = $y->where('Time', $today)->sum('Quantity');
            $report = DB::table('orders')->where('kioskName', $a)->where('Time', $today)
            ->selectRaw('count(Category) as number_of_orders, MealName , Category')
            ->groupBy('MealName', 'Category')
            ->havingBetween('number_of_orders', [1, 100])
            ->get();
            
            $TotalSales = $y->where('Time', $today)->sum('Amount');
            $todaySales[] = Arr::add(['kioskname' => $a, 'TotalSales' => $b, 'Dollars' => $TotalSales], 'Topcategories', $report );
        }

        $yesterdaySales = [];
        foreach( $kioskGroup as $y ) {
            $a = $y[0]['kioskName'];
            $b = $y->whereBetween('Time', [$yesterday, $today])->sum('Quantity');
           
            $report = DB::table('orders')->where('kioskName', $a)->whereBetween('Time', [$yesterday, $today])
            ->selectRaw('count(Category) as number_of_orders, MealName , Category')
            ->groupBy('MealName', 'Category')
            ->havingBetween('number_of_orders', [1, 100])
            ->get();
                 
            $TotalSales = $y->whereBetween('Time', [$yesterday, $today])->sum('Amount');
            $yesterdaySales[] = Arr::add(['kioskname' => $a, 'TotalSales' => $b, 'Dollars' => $TotalSales], 'Topcategories', $report );
        }
        
        $weekSales = [];
        foreach( $kioskGroup as $w ) {
            $a = $w[0]['kioskName'];
            $b = $w->whereBetween('Time', [$week, $today])->sum('Quantity');
            
            $report = DB::table('orders')->where('kioskName', $a)->whereBetween('Time', [$week, $today])
            ->selectRaw('count(Category) as number_of_orders, MealName , Category')
            ->groupBy('MealName', 'Category')
            ->havingBetween('number_of_orders', [1, 100])
            ->get();
            
            $TotalSales = $w->whereBetween('Time', [$week, $today])->sum('Amount');
            $weekSales[] = Arr::add(['kioskname' => $a, 'TotalSales' => $b, 'Dollars' => $TotalSales],  'Topcategories', $report );
        }

        $MonthSales = [];
        foreach( $kioskGroup as $i ){
            $a = $i[0]['kioskName'];
            $b = $i->whereBetween('Time', [$from, $to])->sum('Quantity');
            
            $report = DB::table('orders')->where('kioskName', $a)->whereBetween('Time', [$from, $to])
            ->selectRaw('count(Category) as number_of_orders, MealName , Category')
            ->groupBy('MealName', 'Category')
            ->havingBetween('number_of_orders', [1, 100])
            ->get();

            $TotalSales = $i->whereBetween('Time', [$from, $to])->sum('Amount');
            $MonthSales[] = Arr::add(['kioskname' => $a, 'TotalSales' => $b, 'Dollars' => $TotalSales], 'Topcategories', $report );
        }
        

        $output = [
            'todaySales' => $todaySales,
            'yesterdaySales' => $yesterdaySales,
            'weekSales' => $weekSales,
            'MonthSales' => $MonthSales,

        ];

        return $this->sendResponse($output, 'Reports Generated for account');
    }
}
