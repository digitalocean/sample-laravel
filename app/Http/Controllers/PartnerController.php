<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PartnerController extends Controller {
    /*
    * List all Partners for Url Admins
    */
    public function index(){
        $partners = Partner::all();
        if (session('partner_id')){
            session()->forget(['partner_id']);
        }
        return Inertia::render('Partners/index', [
            'partners' => $partners,
        ]);
    }

    public function show($id) {
        $a = $id; 
        $viewpartner = Partner::where('id', $a)->get();
        $scholarshipassociated = Scholarship::where('partner_id', $a)->get();
        $associatedUser = User::where('partner_id', $a)->get();
        session([ 'partner_id' => $a ]);
         
        return Inertia::render('Partners/show',[
            'viewpartner' => $viewpartner,
            'scholarshipassociated' => $scholarshipassociated,
            'associatedUser' => $associatedUser,
        ]);
    }

    public function store(Request $request): RedirectResponse {
        $a = $request->all(); 
        //dd($a["organization_name"]);
        $b = Partner::create([
            'organization_name' => $a["organization_name"],
            'contact_name' => $a['contact_name'],
            'email' => $a['email'],
            'phone' => $a['phone'],
            'address' => $a['address'],
            'city' => $a['city'],
            'state' => $a['state'],
            'zip' => $a['zip'],
            'consent' => $a['consent'],
        ]);

        $user = User::create([
            'partner_id' => $b['id'],
            'name' => $b['contact_name'],
            'email' => $b['email'],
            'password' => Hash::make('test1234'),
        ]);

        event(new Registered($user));
        
        return to_route('partner.list');
    }

    public function delete($id) {
        dd($id);
    }
}
