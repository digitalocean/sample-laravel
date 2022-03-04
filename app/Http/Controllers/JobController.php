<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }
    public function show($id){
        $job = Job::find($id);
        return view('jobs.index', compact('job'));
    }
}
