<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Exam;

class LoginExamsController extends Controller
{

       public function loginpass(Request $request){
        $student_id = $request->memberid;
        $pass = $request->password;
        $user = DB::table('users')->where('student_id',$student_id )->first();
        $exams = Exam::all();
        $pass2 = $user->password2;
         if($pass2 == $pass){
            return view('map.passexamhall')->with('exams',$exams);
        }else{
            return ('home1');
        }

       }
    /*
        /**
         * Create a new controller instance.
         *
         * @return void
         *//*
        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }
    }*/
    }
