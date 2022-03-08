<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\User;
use Illuminate\Support\Facades\Hash;


class AddressController extends Controller
{
    public function home(){
        return view('addrss.home');
    }
    public function create(){
        return view('address.register');
    }
    public function contactus(){
        return view('address.contactus');
    }
    public function store(Request $request){
        $data = new Address;
        $data->type = $request['type'];
        $data->house = $request['house'];
        $data->street = $request['street'];
        $data->town = $request['town'];
        $data->email = $request['email'];
        $data->save();
        return redirect('/address/dashboard');
    }
    public function show($id){
        $data = Address::find($id);
        return view('address.show', compact('data'));
    }
    public function index(){

        $data = Address::all();

        return view('address.data1',compact('data'));
    }
    public function update(Request $request, $id){
        $data = Address::find($id);
        $data->type = $request['type'];
        $data->house = $request['house'];
        $data->street = $request['street'];
        $data->town = $request['town'];
        $data->email = $request['email'];
        $data->ZIPcode = $request['ZIPcode'];
        $data->country = $request['country'];
        $data->phone = $request['phone'];
        $data->deliveryaddress = $request['deliveryaddress'];
        $data->invoiceaddress = $request['invoiceaddress'];
        $data->transscriptaddress = $request['transscriptaddress'];
        $data->user_id = $request['user_id'];
        $data->save();
        return redirect("/address/data/$id/edit");
    }
    public function updateaddmail(Request $request, $id){
        $data = Address::find($id);

        $data->email = $request['addressemail'];
        $data->update();
        return redirect("address/editaddamail/$id/edit");
    }
    public function edit($id){
        $data = Address::find($id);
        return view('address.edit',compact('data'));
    }

    public function editaddamail($id){
        $data = Address::find($id);
        return view('address.editaddmail',compact('data'));
    }
    public function destroy($id){
        //Here with this function I am first finding the id and
        // then I am deleting it.
        Address::find($id)->delete();
        //After deleting it I am going to redirect back to the uc. in my case.
        //this will call the index method of my controller.
        // Okay lemme show you.
        return redirect('/address/data');
    }
//-----------------------------PASSWORD GHANGES          --------------------------------------------------------------//
public function updatepass(Request $request, $id){
    //$data->oldpassword = $request['oldpassword'];
    //$data->password = $request['confirmpassword'];
    $data = User::find($id);
    $this->validate($request,[
        'newpassword'=> 'required',
        'oldpassword'=> 'required',
        'confirmpassword'=> 'required'
        ]);
    $data = User::find($id);
    $password = $request['newpassword'];
    $data->password = Hash::make($password);
    $data->save();
    return redirect("/address/datapass/$id/edit");
}
public function editpass($id){
    $data = User::find($id);
    return view('address.editpass',compact('data'));
}
//--------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------Email GHANGES          --------------------------------------------------------------//
public function updatemail(Request $request, $id){
    //$data->oldpassword = $request['oldpassword'];
    //$data->password = $request['confirmpassword'];
    $data = User::find($id);
    $this->validate($request,[
        'newmail'=> 'required',
        ]);
    $data = User::find($id);
    $data = $request['newmail'];
    $data->save();
    return redirect("/address/datamail/$id/edit");
}
public function editmail($id){
    $data = User::find($id);
    return view('address.editmail',compact('data'));
}
//--------------------------------------------------------------------------------------------------------------------------------------//
}
/*
public function updatemyaddress(Request $request){
    $this->validate($request,[
        'type'=> 'required',
        'house'=> 'required'
    ]);
    //create myaddress
    $myaddress=User::find(1);
    $myaddress->addresstype =$request->input('addresstype');*/
