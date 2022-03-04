<?php
use Carbon\Carbon;
use Illuminate\Http\Request;
us
use App\Comment;
 use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
-------------------------Templates-------------------------------------------------------------------------------------------------
Route::get('testTheme',function(){  return view('map.testTheme'); });
Route::get('/layout', function(){   return view('layout.layout'); });
Route::get('/copyright', function(){ return view('pages.copyright'); });
Route::get('/termsandconditions', function(){  return view('pages.termsandconditions'); });

Route::any('/', function(){  return view('pages.index');    });
/*--------------------------------------------------------- ----------------------------------------------*/