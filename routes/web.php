<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbastecimentoController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\MapeamentoBombaController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\PosicaoBicoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/monitores/create', function () { return view('admin/monitores_create'); });


Route::get('/', function () {
    return view('landingpage');
});

Route::get('/api/v1/auth', function () {
    return response()->json(['status'=>'success','errorCode'=>'0000','message'=>'Sucesso','csrfToken'=>csrf_token()]);
});

Route::get('/abastecimentos', [TesteController::class, 'index']);

//Route::get('/admin', [PainelController::class, 'all']);

//Route::post('login', [userLogin::class, 'loginPost'])->name('login.post');

Route::post('/login', function () { return view('landingpage'); })->name('login');
Route::get('/api/docs', function () {
    return view('docs');
});

Route::group(array('prefix' => 'api/v1/monitor'), function(){
    Route::post('/login', [MonitorController::class, 'login']);
});

Route::group(array('prefix' => 'api/v1/abastecimento'), function(){

    Route::put('/{id}/baixar', [AbastecimentoController::class, 'baixar']);

    Route::get('/', [AbastecimentoController::class, 'index']);
    Route::get('/{id}', [AbastecimentoController::class, 'show']);
    Route::post('/', [AbastecimentoController::class, 'store']);
    Route::put('/{id}/edit', [AbastecimentoController::class, 'update']);
    Route::delete('/{id}', [AbastecimentoController::class, 'destroy']);
});

Route::group(array('prefix' => 'api/v1/dispositivo'), function(){

    Route::get('/{id}/ativo', [DispositivoController::class, 'ativo']);
    Route::put('/{id}/ativacao', [DispositivoController::class, 'ativacao']);

    Route::get('/', [DispositivoController::class, 'index']);
    Route::get('/{id}', [DispositivoController::class, 'show']);
    Route::post('/', [DispositivoController::class, 'store']);
    Route::put('/{id}/edit', [DispositivoController::class, 'update']);
    Route::delete('/{id}', [DispositivoController::class, 'destroy']);
});

Route::group(array('prefix' => 'api/v1/loja'), function(){
    Route::get('/', [LojaController::class, 'index']);
    Route::get('/{id}', [LojaController::class, 'show']);
    Route::post('/', [LojaController::class, 'store']);
    Route::put('/{id}/edit', [LojaController::class, 'update']);
    Route::delete('/{id}', [LojaController::class, 'destroy']);
});

Route::group(array('prefix' => 'api/v1/posicaobico'), function(){
    Route::get('/', [PosicaoBicoController::class, 'index']);
    Route::get('/{id}', [PosicaoBicoController::class, 'show']);
    Route::post('/', [PosicaoBicoController::class, 'store']);
    Route::put('/{id}/edit', [PosicaoBicoController::class, 'update']);
    Route::delete('/{id}', [PosicaoBicoController::class, 'destroy']);
});

Route::group(array('prefix' => 'api/v1/mapeamentobomba'), function(){
    Route::get('/', [MapeamentoBombaController::class, 'index']);
    Route::get('/{id}', [MapeamentoBombaController::class, 'show']);
    Route::post('/', [MapeamentoBombaController::class, 'store']);
    Route::put('/{id}/edit', [MapeamentoBombaController::class, 'update']);
    Route::delete('/{id}', [MapeamentoBombaController::class, 'destroy']);
});

Route::group(array('prefix' => 'api/v1/usuario'), function(){
    Route::get('/', [UsuarioController::class, 'index']);
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::post('/', [UsuarioController::class, 'store']);
    Route::put('/{id}/edit', [UsuarioController::class, 'update']);
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'admin'), function(){
    Route::get('/', 'PainelController@all')->name('admin/painel');
    Route::get('/monitores', function () { return view('admin/monitores'); });
    Route::get('/rede/{id}', function () { return view('admin/rede'); });
    Route::get('/empresas', function () { return view('admin/empresas'); });
    Route::get('/bombas', function () { return view('admin/bombas'); });
    Route::get('/dispositivos', function () { return view('admin/dispositivos'); });
    Route::get('/usuarios', function () { return view('admin/usuarios'); });
    Route::get('/docs', function () { return view('admin/docs'); });
});
