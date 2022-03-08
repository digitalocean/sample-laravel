<?php

namespace App\Http\Controllers;


use Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller {
   public function setCookie(Request $request) {
      $user = Auth::user()->name;
      $password = Auth::user()->password2;
      $minutes = 1;
      $response = new Response('Hello World');
      $response->withCookie(cookie('name', $user, $minutes));
      $response->withCookie(cookie('password', $password, $minutes));
      return $response;
   }
   public function getCookie(Request $request) {
      $value = $request->cookie('name');
      $value2 = $request->cookie('password');
      echo $value.'  '.$value2;
   }
}
