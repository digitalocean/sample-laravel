<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.admin-login');
    }
    public function login(){
        //return true;
        return view('proctor');

    }
}
