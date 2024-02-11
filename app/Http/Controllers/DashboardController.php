<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Partner;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{   
    public function index(){

        $user = Auth::user();
        $role = session()->get('role');
        if ($role == 'admin') {
            $scholarships = Scholarship::get();
            $applications = Application::get();
            $partners = Partner::get();
            return Inertia::render('Dashboard', [
                'scholarships' => $scholarships,
                'applications' => $applications,
                'partners' => $partners,
            ]);
            
        }
        $partnerId = $user->partner_id;
        return redirect()->route('partner.show', ['id' => $partnerId]);
        
    }
}
