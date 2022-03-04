<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\User;
use App\Admin;
use App\Student;
use App\Invoice;
use App\Payment;
use App\Reference;
use App\Subject;
use Mail;
use App\Mail\StudentInvoice;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MyrefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $references= Reference::find($id);
        $user = User::find(1);
        $refere=Reference::join('users','users.id','=','references.user_id')
          ->select('users.id as id', 'references.id as id', 'references.name as name', 'references.phone as phone', 'references.address as address', 'references.email as email', 'references.relationship as relationship')
          ->get();
        return view('myreference.edit')->with('references',$references)->with('refere',$refere);

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
        $this->validate($request,[
            'name'=>'required',
            'email' =>'required'
        ]);
//Create References
        $reference = Reference::find($id);
        $reference->name=$request->input('name');
        $reference->relationship=$request->input('relationship');
        $reference->email=$request->input('email');
        $reference->phone=$request->input('phone');
        $reference->address=$request->input('address');
        $reference->update();
        //return redirect('map/myreferences')->with('success','Update Successfuly');
        $user = User::find(1);
        $references=Reference::join('users','users.id','=','references.user_id')
        ->select('users.id as id', 'references.id as id', 'references.name as name', 'references.phone as phone', 'references.address as address', 'references.email as email', 'references.relationship as relationship')
        ->get();
        return view('map.myreferences')->with('success', 'References Created')->with(['user'=>1,'references' => $references ]);
        //return view('myreference.update');
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
