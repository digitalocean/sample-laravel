<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Partner;
use App\Models\Scholarship;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{   
    public function index(){
        $user = Auth::user();
        $role = session()->get('role');        
        if ($role === 'admin') {
            $scholarships = Scholarship::get();
            $applications = Application::get();
            $totalApplications = DB::table('scholarship_applications')->get()->count();
            $partners = Partner::get();
            $yearUpdate = Year::get();

            return Inertia::render('Dashboard', [
                'scholarships' => $scholarships,
                'applications' => $applications,
                'partners' => $partners,
                'totalApplications' => $totalApplications,
                'yearUpdate' => $yearUpdate,
            ]);
            
        } 

        if($role === 'partner') {
            $partnerId = $user->partner_id;
            return redirect()->route('partner.show', ['id' => $partnerId]);
        } 
        
        
    }
}
