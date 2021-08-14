<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbastecimentoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\PainelController;

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
    return view('landingpage');
});

Route::get('/csrf', function () {
    return view('csrf');
});


Route::get('/abastecimentos', [TesteController::class, 'index']);

//Route::get('/admin', [PainelController::class, 'all']);

Route::get('/login', function () { 
    return view('landingpage'); 
});

Route::group(array('prefix' => 'admin'), function(){
    Route::get('/', function () { return view('admin/index'); });
    Route::get('/docs', function () { return view('admin/docs'); });
    Route::get('/monitor', function () { return view('admin/monitor'); });
});



Route::get('/api/docs', function () {
    return view('docs');
});

Route::get('/api/abastecimento/{id}', function ($id) {
    return 'Abastecimento '.$id;
});

Route::post('/api/abastecimento/{id}', function ($id) {
    return 'Abastecimento '.$id;
});

Route::get('/api/v1/abastecimento', [AbastecimentoController::class, 'index']);
Route::get('/api/v1/abastecimento/{id}', [AbastecimentoController::class, 'show']);
Route::post('/api/v1/abastecimento', [AbastecimentoController::class, 'store']);
Route::put('/api/v1/abastecimento/{id}/edit', [AbastecimentoController::class, 'update']);
Route::delete('/api/v1/abastecimento/{id}', [AbastecimentoController::class, 'destroy']);

/*
Route::get('/api/v1/abastecimento/create', [AbastecimentoController::class, 'create']);
Route::get('/api/v1/abastecimento/{id}', [AbastecimentoController::class, 'show']);
Route::get('/api/v1/abastecimento/{id}/edit', [AbastecimentoController::class, 'edit']);
*/


/*
// php artisan cache:clear
// php artisan route:clear
// php artisan config:clear
// php artisan view:clear
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
*/
/*
Route::resource('abastecimento', 'AbastecimentoController', ['only' => ['index', 'show']]);
Route::resource('abastecimento', 'AbastecimentoController', ['except' => ['create', 'store', 'update', 'destroy']]);
Route::resource('abastecimento', 'AbastecimentoController', ['names' => ['create' => 'abastecimento.build']]);
Route::resource('abastecimento.lancamentoss', 'AbastecimentoLancamentoController');
Route::get('abastecimento/ultimos', 'AbatecimentoController@method');
Route::resource('abastecimento', 'AbastecimentoController');
*/