<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Role;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $a = $request->all(); //dd($a);
   
        // $b = User::create([
        //     'name' => $a[0]['name'],
        //     'email' => $a[0]['email'],
        //     'password' => hash::make($a[0]['password']),
        //     'partner_id' => $a[0]['partner_id'],
        // ]);
        $b = DB::table('users')->where('id', $user->id)->updateOrInsert(
            ['email' => $a[0]['email'], 'name' => $a[0]['name']],
            [ 'partner_id' => $a[0]['partner_id'], 'password' => hash::make($a[0]['password']) ]
        );

        $user = User::find($user->id);
        if($request->role !== 'null') {
            $user->assignRole($request->role);
        }
        
        return redirect()->route('user.index');
    }


    public function edit($id) {
        $user = User::find($id);
        $roles = Role::get();
        $partners = Partner::get(); //dd($partners);

        return Inertia::render('Users/update', [
            'roles' => $roles,
            'partners' => $partners,
            'userdata' => $user
        ]);
    }


    public function destroy($id): RedirectResponse
    {   
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}