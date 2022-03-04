<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  //  use AuthenticatesUsers;

    protected $redirectTo = 'ross';
    protected $guard = 'admin';

    public function __construct()
    {

     //   DB::setDefaultConnection('student');
      $this->middleware('guest:admin',['except' => 'logout']);
        
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function student_id()
    {
        return 'name';
    }
    public function login(Request $request){
       // Config::set('database.default', 'student');
     //   Config::set('database.connections.mysql.database', 'student') ;
        $this->validate($request,[
            'name' => 'required|string',
            'password' => 'required|min:6|max:15'
        ]);

     //   Auth::guard('admin')->setConnection('student');

        if(Auth::guard('admin')->attempt(['name'=> $request->name, 'password' => $request->password] , $request->remember))
        {
            return redirect()->intended(route('ross'));
          //  protected $redirectTo = '/home';
        }
     //   'failed' => 'These credentials do not match our records.';
        return redirect()->back()->withInput($request->only('name'));
    }

    public function StudentLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|min:3|max:15'
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }

        if(Auth::guard('admin')->attempt(['name'=> $request->name, 'password' => $request->password] , $request->remember))
        {
            return response()->json(array('login'=> "admin.home"));
          //  protected $redirectTo = '/home';
        }
        else{
            return response()->json(array('errors'=> "credentials are not correct"));
        }
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return  redirect('/');

        //$this->guard('admin')->logout();

        //$request->session()->invalidate();

       // return $this->loggedOut($request) ?: redirect('/');
    }
}
