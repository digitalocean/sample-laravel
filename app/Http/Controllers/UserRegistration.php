<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserRegistration extends Controller {
   public function postRegister(Request $request) {
      //Retrieve the name input field
      $name = $request->input('name');
      echo 'Name: '.$name;
      echo '<br>';

      //Retrieve the username input field
      $username = $request->username;
      echo 'Username: '.$username;
      echo '<br>';

      //Retrieve the password input field
      $password = $request->password;
      echo 'Password: '.$password;
   }
}
