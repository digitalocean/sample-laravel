<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    // Partnersphp artisan
    Route::controller(PartnerController::class)->group(function () {
        Route::get('partners', 'index')->name('partner.list');
        Route::get('partner/show{id}', 'show')->name('partner.show');
        Route::post('partner/create', 'store')->name('partner.create');
    });

    Route::controller(ApplicationController::class)->group(function () {
        Route::get('application', 'index')->name('application.list');
        Route::get('application/show{id}', 'show')->name('application.view');
        Route::get('scholoarship/applications{id}', 'scholarshipapplications')->name('scholarship.applications.view');
    });

    Route::controller(ScholarshipController::class)->group(function () {
        Route::get('scholarship', 'index')->name('scholarship.list');
        Route::get('scholarship/show{id}', 'show')->name('scholarship.show');
        Route::post('scholarship/update', 'update')->name('scholarship.update');
        // Route::post('partner/scholarship/create', 'store')->name('scholarship.create');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user adjustments
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/delete{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::post('csv/import', [ImportController::class, 'importscholarship'])->name('csv.import');
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/auth.php';
