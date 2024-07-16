<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\WinnerController;
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

Route::middleware(['auth', 'verified' ])->group(function () {
    
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::controller(PartnerController::class)->group(function () {
        Route::get('partner/show{id}', 'show')->name('partner.show');
    });

});

Route::middleware(['auth', 'verified', 'role:scholar'])->group(function (){
    Route::controller(ScholarController::class)->group(function () {
        Route::get('scholars/dashboard', 'index')->name('scholar.dashboard');
        Route::get('scholars/application', 'scholarsApplication')->name('scholar.application');
        Route::get('scholars/list', 'scholarshipList')->name('scholar.list');
        Route::post('scholars/application/create', 'storeScholarship')->name('scholar.application.create');
        Route::get('scholars/view{scholarship}', 'scholarshipView')->name('scholar.application.view');
        Route::get('scholars/apply{scholarship}', 'applyScholarship')->name('scholar.apply');
    });
});

Route::middleware(['auth', 'verified', 'role:admin|partner'])->group(function () { 
    // Partnersphp artisan
    Route::controller(PartnerController::class)->group(function () {
        Route::post('partner/create', 'store')->name('partner.create');
    });

    Route::controller(ApplicationController::class)->group(function () {
        Route::get('application/show{id}', 'show')->name('application.view');
        Route::get('scholoarship/applications{id}', 'scholarshipapplications')->name('scholarship.applications.view');
    });

    Route::controller(ScholarshipController::class)->group(function () {
        Route::get('scholarship/show{id}', 'show')->name('scholarship.show');
        Route::post('partner/scholarship/create', 'store')->name('scholarship.create');
        Route::get('scholarship/edit', 'edit')->name('scholarship.edit');
        Route::post('scholarship/update', 'update')->name('scholarship.update');
        Route::get('partner/scholarship/delete{id}', 'destroy')->name('scholarship.delete');
    });

    Route::controller(WinnerController::class)->group(function () {
        Route::get('winners/list', 'index')->name('winners.list');
        Route::post('create/winner', 'createWinner')->name('create.winner');
        Route::post('update/winner{winner}', 'updateWinner')->name('update.winner');
        Route::get('delete/winner{winner}', 'destroy')->name('delete.winner');
    });

    Route::controller(NoteController::class)->group(function (){
        Route::get('notes/create{id}', 'createNotes')->name('create.notes');   
        Route::post('note/student/create', 'storeNote')->name('notes.student.create');
    });

});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    
    // Partnersphp artisan
    Route::controller(PartnerController::class)->group(function () {
        Route::get('partners', 'index')->name('partner.list');
    });

    Route::controller(ApplicationController::class)->group(function () {
        Route::get('application', 'index')->name('application.list');
    });

    Route::controller(ScholarshipController::class)->group(function () {
        Route::get('scholarship', 'index')->name('scholarship.list');
        Route::get('scholarship/refresh', 'scholarshipRefresh')->name('scholarship.refresh');
    });

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user adjustments
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/update{id}', [UserController::class, 'edit'])->name('user.update');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/delete{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::post('csv/import', [ImportController::class, 'importscholarship'])->name('csv.import');
    Route::post('csv/import/application', [ImportController::class, 'importApplications'])->name('csv.import.application');
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/auth.php';
