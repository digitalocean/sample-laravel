<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\KioskController;
use App\Http\Controllers\Api\MealsController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\DiscountController;
use App\Http\Controllers\API\RestockController;
use App\Http\Controllers\API\ChargesController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\FaqController;

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


Route::controller(UserAuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

Route::post('/mobile-payment-intent', [PaymentController::class, 'makePaymentIntent']);
// Customer Service application
Route::post('application', [CustomerController::class, 'franchiseeApplication']);

//Stripe additional data
Route::get('charges/stripe', [ChargesController::class, 'updateCustomer']);



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/refresh-token', [UserAuthController::class, 'refreshToken']);
});
Route::middleware('auth:sanctum')->group(function() {
    Route::get('accounts', [AccountController::class, 'index']);
    Route::post('create/franchisee', [AccountController::class, 'createFranchisee']);
    Route::post('update/franchisee/{account}', [AccountController::class, 'updateFranchisee']);
    Route::get('accounts/{account}', [AccountController::class, 'franchiseAccount']); 
    Route::get('accounts/products/{account}', [AccountController::class, 'franchiseeProducts']);
    Route::get('accounts/profile/{account}', [AccountController::class, 'franchiseeProfile']);
    Route::post('create/pin/{account}', [AccountController::class, 'createAccountPin']);
    Route::post('confirmation/pin/{account}', [AccountController::class, 'verifyPin']);

    //Kisok and meals driect Reports
    Route::get('accounts/sales/{account}', [AccountController::class, 'kioskSales']);

    // Kiosk Calls
    Route::post('create/kiosk', [KioskController::class, 'createKiosk']);
    Route::get('kiosks', [KioskController::class, 'index']);
    Route::get('edit/kiosks/{kiosk}', [KioskController::class, 'editKiosk']);
    Route::post('update/kiosks/{id}', [KioskController::class, 'updateKiosk']);
    Route::get('delete/kiosks/{id}', [KioskController::class, 'delete']);

    // Order calls
    Route::get('orders', [OrdersController::class, 'orders']);
    Route::get('order/{order}', [OrdersController::class, 'orderNumber']);

    // Category
    Route::get('categories/list', [CategoryController::class, 'index']);

    // faq
    Route::get('faq/list', [FaqController::class, 'index']);
    Route::post('faq/create', [FaqController::class, 'createFaq']);
    Route::post('faq/update', [FaqController::class, 'updateFaq']);
    Route::get('faq/delete', [FaqController::class, 'deleteFaq']);
    // Reports
    Route::get('reports/orders/{account}', [OrdersController::class, 'orderReports']);

    // Franchisee Feedback
    Route::get('feedback', [FeedbackController::class, 'allFeedback']);
    Route::post('submit/feedback/{account}', [FeedbackController::class, 'feedbackFranchisee']);
    Route::get('feedback/{account}', [FeedbackController::class, 'accountUserFeedback']);
    Route::get('feedback/delete/{account}', [FeedbackController::class, 'deleteFeedback']);

    //meal calls
    Route::get('meals', [MealsController::class, 'meals']);
    Route::post('create/meals', [MealsController::class, 'createMeals']);
    Route::get('edit/meals/{meal}', [MealsController::class, 'editMeals']);
    Route::post('update/meals/{id}', [MealsController::class, 'updateMeals']);
    Route::get('delete/meals/{id}', [KioskController::class, 'delete']);

    // Restock tranactions
    Route::get('restock/tranactions/{kiosk}', [RestockController::class, 'restock']);
    Route::post('create/restock/{kiosk}', [RestockController::class, 'createRestock']);

    // Discount Franchisee request
    Route::post('create/discount', [DiscountController::class, 'createDiscount']);

    // member payment 
    Route::post('/member-payment', [PaymentController::class, 'memberPayment']);
    
    // wallet process
    Route::post('/wallet/addfunds', [PaymentController::class, 'userAddFunds']);
});




