<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScholarCollection;
use App\Http\Resources\ScholarResource;
use App\Models\Application;
use App\Models\Scholar;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScholarController extends Controller
{
    public function index(){
        $user = Auth::user(); 
        $a = DB::table('scholars')->where('user_id', $user->id)
            ->join('applications', 'scholars.application_id', 'applications.id')
            ->select('scholars.email', 'scholars.parent_name2', 'scholars.parent_email2', 'applications.*' )->get();
        //$scholar = ScholarResource::collection($a);
        //dd($scholar);
        return Inertia::render('Scholars/Dashboard',[
            'scholar' => $a,
            // dd(ScholarResource::collection($a))
        ]);
    }
}
