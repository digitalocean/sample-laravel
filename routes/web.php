<?php

use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('token.token');
});

//Metamask
Route::prefix('games')->group(function () {
    Route::get('/', [TransactionsController::class, 'index'])->name('metamask');
    Route::post('/transaction/create', [TransactionsController::class, 'create'])->name('transaction.create');
});
