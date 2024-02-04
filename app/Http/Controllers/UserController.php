<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Role;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //
    public function index() {

        $users = DB::table('users')
            ->join('partners', 'users.partner_id', '=', 'partners.id')
            ->select( 'users.id','users.name', 'users.email', 'partners.organization_name')
            ->get(); 

        return Inertia::render('Users/index', [
            'users' => $users,
            //dd(new UserResource($users)),
        ]);
    }

    public function create(){
        $users = User::get();
        $roles = Role::get();
        $partners = Partner::get();

        return Inertia::render('Users/create',[
            'roles' => $roles,
            'partners' => $partners,
            'users' => $users
        ]);
    }

    public function store(Request $request): RedirectResponse {
        
        $a = $request->all();
   
        $b = User::create([
            'name' => $a[0]['name'],
            'email' => $a[0]['email'],
            'password' => hash::make($a[0]['password']),
            'partner_id' => $a[0]['partner_id'],
        ]);
        $user = User::find($b->id);
        $role = $user->assignRole($a[0]['role']);
        return redirect()->route('user.index');

    }


    public function edit($id) {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }


    public function destroy($id): RedirectResponse
    {   
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}