<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationCollection;
use App\Models\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ApplicationController extends Controller {
    // this is admin list so we see all applicants
    public function index() {
        $applications = Application::all();
        //dd($applications);
        return Inertia::render('Applications/index',[
            'applications' => new ApplicationCollection($applications),
        ]);
    }

    public function show($id) {
        $appID = $id;
        $applicationdetail = Application::where('id', $appID)->get(); //dd($applicationdetail);
        return Inertia::render('Applications/show', [
            'applicationdetail' => $applicationdetail,
        ]);
    }

    // application list by scholarshipId
    public function scholarshipapplications($id){
        $a = $id;
        $selected = Application::where('scholarshipid', $a)->get();
        //dd($selected);
        return Inertia::render('Applications/scholarshiplist', [
            'applications' => new ApplicationCollection($selected),
        ]);
    }
}

