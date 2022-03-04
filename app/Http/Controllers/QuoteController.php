<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;
use PDF;




class QuoteController extends Controller
{


    //get Index page
    public function index(){
       // $when = Carbon::now()->addSeconds(10);

        //User::find(1)->notify((new InvoicePaid)->delay($when));
        ////////ارسال ايميل عند دخول هذه الصفخة
       // *** Notification::route('mail', 'info@NBC.com')
            //->route('nexmo', '5555555555')
   ///      ->notify(new InvoicePaid());
    //     $data = ['Nazlay Businses College'];
    //     $pdf = PDF::loadView('pdf.invoice',$data);
    //            return $pdf->download('invoice.pdf');
                return view('quotes.index');
            }
            public function show(){
                return view('quotes.show');
            }
        }
