<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\API\BaseController as BaseController;
use Vyuldashev\LaravelOpenApi\Attributes as OpenAPI;


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
}
