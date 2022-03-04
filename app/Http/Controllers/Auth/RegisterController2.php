<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['string', 'min:8', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
			'g-recaptcha-response' => ['required|captcha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return   Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['string', 'min:8', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
/*
        $password = '12121212';
        $hash = '$2y$10$lHc01EQYAV44p9cNXiqkv.SWzECG70catVd4nXTbaFQhR/w6U55Se';

        echo 'The Password = '.$password.'<br>' ;
        echo 'The Hash = '.$hash.'<br>' ;

        // The cost parameter can change over time as hardware improves
        $options = array('cost' => 10);

        // Verify stored hash against plain-text password
        if (password_verify($password, $hash)) {
            // Check if a newer hashing algorithm is available
            // or the cost has changed
                    echo '2Hash::::'.$hash.'<br>';

            if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
                echo '3Hash::::'.$hash.'<br>';
                // If so, create a new hash, and replace the old one
                $newHash = password_hash($password, PASSWORD_DEFAULT, $options);
                echo '4NewHash = '.$newHash.'  ....<br>';
            }

            // Log user in
            echo 'login'
*/
//The cost parameter can change over time as hardware improves
        $options = array('cost' => 4);

        // Verify stored hash against plain-text password
        //if (password_verify($password, $hash)) {
            // Check if a newer hashing algorithm is available
            // or the cost has changed
                //    echo '2Hash::::'.$hash.'<br>';

           // if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
//echo '3Hash::::'.$hash.'<br>';
                // If so, create a new hash, and replace the old one
                $password =  $data->password;
                $data->password = password_hash($password, PASSWORD_DEFAULT, $options);
               // echo '4NewHash = '.$newHash.'  ....<br>';
           // }

            // Log user in
          //  echo 'login';
        $reg = DB::table('users');
        $reg->name = $data->name;
        $reg->phone = $data->phone;
        $reg->email = $data->email;
        $reg->password = $data->password;
        $reg->save();
        return view('home123');
        /*
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/
    }
}
