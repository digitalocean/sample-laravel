<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;


class AdminController extends Controller
{

        /**
         * create new one controller
         * @return void
         *
         */
        public function __construct()
        {
            $this->middleware('auth:admin');

        }

    //get Index page
    public function adminHome(){

        return view('admin.home');
    }

    public function index(){

                return view('admin.home');
            }
    public function show(){
                return view('admin.show');
            }

    }
