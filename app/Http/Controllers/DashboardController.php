<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Partner;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{   
    public function index(){

        $scholarships = Scholarship::get();
        $applications = Application::get();
        $partners = Partner::get();
        return Inertia::render('Dashboard', [
            'scholarships' => $scholarships,
            'applications' => $applications,
            'partners' => $partners,
        ]);
    }
}
