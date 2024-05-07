<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//         'device_name' => 'required',
//     ]);
 
//     $user = User::where('email', $request->email)->first();
 
//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }
 
//     return $user->createToken($request->device_name)->plainTextToken;
// });
Route::post('/mobile-payment-intent', [PaymentController::class, 'makePaymentIntent']);

Route::controller(UserAuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

//test token yU0kPzuJYKWIyjQODg75F30iEJwAOs7FuC7gF67F8e6fe6f4
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/refresh-token', [UserAuthController::class, 'refreshToken']);
});
//01hx2g2p05zak03ce4p992c0gp
Route::middleware('auth:sanctum')->group(function() {
    Route::get('accounts', [AccountController::class, 'index']);
    Route::get('accounts/{id}', [AccountController::class, 'franchiseAccount']);  

    // member payment 
    Route::post('/member-payment', [PaymentController::class, 'memberPayment']);
    // wallet process
    Route::post('/wallet/addfunds', [PaymentController::class, 'userAddFunds']);
});
