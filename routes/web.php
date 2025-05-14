<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LocacoesController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CentroCustosController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('clientes.index', [ClientesController::class, 'index']);
    Route::get('clientes.create', [ClientesController::class, 'create']);
    Route::post('clientes.create',[ClientesController::class, 'store']);
    Route::get('clientes.edit/{cliente}', [ClientesController::class, 'edit']);
    Route::post('clientes.edit/{cliente}', [ClientesController::class, 'update']);

    Route::get('locacoes.index', [LocacoesController::class, 'index']);
    Route::get('locacoes.create', [LocacoesController::class, 'create']);
    Route::post('locacoes.create',[LocacoesController::class, 'store']);
    Route::get('locacoes.edit/{cliente}', [LocacoesController::class, 'edit']);
    Route::post('locacoes.edit/{cliente}', [LocacoesController::class, 'update']);

    Route::get('cargos.index', [CargosController::class, 'index']);
    Route::get('cargos.create', [CargosController::class, 'create']);
    Route::post('cargos.create', [CargosController::class, 'store']);
    Route::get('cargos.edit/{cargo}', [CargosController::class, 'edit']);
    Route::post('cargos.edit/{cargo}', [CargosController::class, 'update']);

    Route::get('custos.index', [CentroCustosController::class, 'index']);
    Route::get('custos.create', [CentroCustosController::class, 'create']);
    Route::post('custos.create', [CentroCustosController::class, 'store']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
