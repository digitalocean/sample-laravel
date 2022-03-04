<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Customer    ;

class PdfController extends Controller
{
    public function index(){
        $data = ['name' => 'Sarakhan'];
        return view('invoice', compact('data'));
    }
    public function export(){
        $data = ['name' => 'Sirelkhatim'];
        $pdf = PDF::loadView('invoice', compact('data'));
        return $pdf->download('invoice.pdf');

    }
    public function getPDF(){
        $customers=Customer::all();
        $pdf= PDF::loadView('customer.pdf',['customers'=>$customers]);
        return $pdf->download('customer.pdf');
    }

    
    public function certificatepdf(){
        $users=User::all();
        $pdf= PDF::loadView('customer.pdf',['userss'=>$users]);
        return $pdf->download('customer.pdf');
    }
}
