<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class RandomController extends Controller
{
    public $customer;
    public $item;
    public $invoice;
 public  function show(){

            $customer = new Buyer([
                    'name' => 'John Doe',
                    'custom_fields' => [
                        'email' => 'test@example.com',
                    ],
                ]);

                $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

                $invoice = Invoice::make()
                    ->buyer($customer)
                    ->addItem($item);

    return $invoice->stream();
 }
}
