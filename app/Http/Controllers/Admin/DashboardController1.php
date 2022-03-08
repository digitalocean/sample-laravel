<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered(){
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }
    public function registeredit(Request $request , $id){
        $id = User::findOrFail($id);
        return view('admin.register-edit');
    }
    public function registerupdate(Request $request , $id){
        $users = User::find($id);
        $status = Status::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $user->update();

        return redirect('role_register')->with('status', 'Your Data is Updated');

    }
    public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role_register')->with('status', 'Your Data is Deleted');

    }
}
