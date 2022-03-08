<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\regDB;
use App\User;
use DB;
use Cache;

class UserController extends Controller
{
    public function home(){
    return view('home');
}
public function create(){
    return view('register');
}
public function contactus(){
    return view('contactus');
}

public function AuthRouteAPI(Request $request){
    return $request->user();
}


public function store(Request $request){
   /* $data = new RegDB;
    $data->name = $request['name'];
    $data->mobile = $request['mobile'];
    $data->email = $request['email'];
    $data->gender = $request['gender'];
    $data->city = $request['city'];
    $data->save();
    return redirect('/');*/
 
        $request->validate([
        'name' => ['required', 'string', 'max:191'],
        'username' => ['required', 'string', 'max:191'],
       'phone'=> ['required'],
        'email' => ['required', 'string', 'max:191', 
        'unique:users'],
        'password' =>[ 'required', 'string', 'max:191', 
        'confirmed'],
        ]);
        $userreg = new User([
        'name' => $request->get('name'),
        'username'=> $request->get('username'),
        'phone'=> $request->get('email'),
        'password' => Hash::make($request['password']),
        ]);$email = $request->get('email');$data = ([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'username' => $request->get('username'),
        'phone' => $request->get('phone'),
        ]);
        Mail::to($email)->send(new WelcomeMail($data));
        
        $userreg->save();
        
        flash('User has been added!','success')->important();
        return back();
}
public function show($id){
    $data = RegDB::find($id);
    return view('admin.show', compact('data'));
}
public function index(){

    $data = User::all();

    return view('admin.index',compact('data'));
}
public function update(Request $request, $id){
    $data = RegDB::find($id);
    $data->name = $request['name'];
    $data->email = $request['email'];
    $data->mobile = $request['mobile'];
    $data->gender = $request['gender'];
    $data->city = $request['city'];
    $data->save();
    return redirect("/uc/$id");
}
public function edit($id){
    $data = RegDB::find($id);
    return view('admin.edit',compact('data'));
}
public function destroy($id){
    //Here with this function I am first finding the id and
    // then I am deleting it.
    RegDB::find($id)->delete();
    //After deleting it I am going to redirect back to the uc. in my case.
    //this will call the index method of my controller.
    // Okay lemme show you.
    return redirect('/uc');
}

    /**
     * Show user online status.
     *
     */
    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();
    
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }
}
