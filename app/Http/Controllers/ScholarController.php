<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScholarCollection;
use App\Http\Resources\ScholarResource;
use App\Models\Application;
use App\Models\Scholar;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ScholarController extends Controller {

    public function index() {

        $user = Auth::user(); 
 
        $a = DB::table('scholars')->where('user_id', $user->id)
            ->join('applications', 'scholars.application_id', 'applications.id')
            ->select('scholars.email', 'scholars.parent_name2', 'scholars.parent_email2', 'applications.*' )->get();
        //$scholar = ScholarResource::collection($a);
        $scholarships = Application::find($a[0]->id)->scholarships()->get();

        return Inertia::render('Scholars/Dashboard',[
            'scholar' => $a,
            'scholarships' => $scholarships,
        ]);
        
    }

    public function scholarsApplication() {
        $user = Auth::user();
        
        $preScholar = Scholar::where('user_id', $user->id)->get();
        $application = Application::where('id', $preScholar[0]['application_id'])->get();

        return Inertia::render('Applications/createApplication', [
            'application' => $application,
        ]);
    }
}
