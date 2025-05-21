<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LocacoesController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CentroCustosController;
use App\Http\Controllers\DadosBancariosController;
use App\Http\Controllers\AlimentacoesController;
use App\Http\Controllers\AdiantamentosController;
use App\Http\Controllers\FaltasController;
use App\Http\Controllers\AtestadosController;
use App\Http\Controllers\InssController;
use App\Http\Controllers\HoleritesController;

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

    Route::get('funcionarios.index', [FuncionariosController::class, 'index']);
    Route::get('funcionarios.create', [FuncionariosController::class, 'create']);
    Route::post('funcionarios.create', [FuncionariosController::class, 'store']);
    Route::get('funcionarios.edit/{cargo}', [FuncionariosController::class, 'edit']);
    Route::post('funcionarios.edit/{cargo}', [FuncionariosController::class, 'update']);

    Route::get('dadosbancarios.index', [DadosBancariosController::class, 'index']);
    Route::get('dadosbancarios.create', [DadosBancariosController::class, 'create']);
    Route::post('dadosbancarios.create', [DadosBancariosController::class, 'store']);
    Route::get('dadosbancarios.edit/{cargo}', [DadosBancariosController::class, 'edit']);
    Route::post('dadosbancarios.edit/{cargo}', [DadosBancariosController::class, 'update']);

    Route::get('alimentacoes.index', [AlimentacoesController::class, 'index']);
    Route::get('alimentacoes.create', [AlimentacoesController::class, 'create']);
    Route::post('alimentacoes.create', [AlimentacoesController::class, 'store']);
    Route::delete('alimentacoes/{alimentacao}', [AlimentacoesController::class, 'delete']);

    Route::get('adiantamentos.index', [AdiantamentosController::class, 'index']);
    Route::get('adiantamentos.create', [AdiantamentosController::class, 'create']);
    Route::post('adiantamentos.create',[AdiantamentosController::class, 'store']);
    Route::delete('adiantamentos/{adiantamento}', [AdiantamentosController::class, 'delete']);

    Route::get('faltas.index', [FaltasController::class, 'index']);
    Route::get('faltas.create', [FaltasController::class, 'create']);
    Route::post('faltas.create', [FaltasController::class, 'store']);
    Route::delete('faltas/{falta}', [FaltasController::class, 'delete']);   

    Route::get('atestados.index', [AtestadosController::class, 'index']);
    Route::get('atestados.create', [AtestadosController::class, 'create']);
    Route::post('atestados.create', [AtestadosController::class, 'store']);
    Route::delete('atestados/{atestado}', [AtestadosController::class, 'delete']);

    Route::get('inss.index', [InssController::class, 'index']);
    Route::get('inss.create', [InssController::class, 'create']);
    Route::post('inss.create', [InssController::class, 'store']);
    Route::delete('inss/{inss}', [InssController::class, 'delete']);   

    Route::get('holerites.index', [HoleritesController::class, 'index']);
    Route::get('holerites.listanormal/', [HoleritesController::class, 'listanormal']);
    Route::get('holerites.individual/{id}',[HoleritesController::class, 'pdf']);
    Route::get('holerites.lista/',[HoleritesController::class, 'pdflista']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
