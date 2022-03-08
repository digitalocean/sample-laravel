<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Admin;
use App\Student;
use App\Invoice;
use App\Payment;
use App\Reference;
use App\Myaddress;
use App\Subject;
use Mail;
use App\Mail\StudentInvoice;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
//use DB;
use Illuminate\Support\Facades\DB;

class MyaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
///-----------------------auth login ----------------------------------------------------
     public function __construct(){
         $this->middleware('auth');
     }
//--------------------------------------------------------------------------------------
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('myaddress');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myaddresses = Myaddress::find($id);
        return view('myaddresses.edit')->with('myaddresses',$myaddresses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /*  $this->validate($request,[
            'type'=> 'required',
            'house'=> 'required'
        ]);
        //create myaddress
        $myaddress=Myaddress::find(1);
        $myaddress->type =$request->input('type');
        $myaddress->house =$request->input('house');
        $myaddress->country =$request->input('country');
        $myaddress->Street =$request->input('Street');
        $myaddress->town =$request->input('town');
        $myaddress->ZIPCode =$request->input('ZIPCode');
        $myaddress->phone =$request->input('phone');
        $myaddress->email =$request->input('email');
        $myaddress->user_id = Auth::user()->id;
        $myaddress->save();
return redirect('/myaddress/{id}/edit')->with('success', 'Update Complete')->with($myaddress);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
