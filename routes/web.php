<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClassificacaoController;
use App\Http\Controllers\ServidorController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\MovimentoController;

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

Auth::routes();

Route::name('home')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'index');
});

Route::prefix('predio')->name('predio.')->controller(PredioController::class)->group(function () {
    Route::get('/listar', 'index')->name('index');
    Route::get('/cadastrar', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{predio_id}/editar', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/{predio_id}/delete', 'delete')->name('delete');
});

Route::prefix('predio')->name('sala.')->controller(SalaController::class)->group(function () {
    Route::get('/{predio_id}/sala/listar', 'index')->name('index');
    Route::get('/{predio_id}/sala/cadastrar', 'create')->name('create');
    Route::post('/sala/store', 'store')->name('store');
    Route::get('/sala/{sala_id}/editar', 'edit')->name('edit');
    Route::put('/sala/update', 'update')->name('update');
    Route::delete('/sala/{sala_id}/delete', 'delete')->name('delete');
});

Route::prefix('cargo')->name('cargo.')->controller(CargoController::class)->group(function () {
    Route::get('/listar', 'index')->name('index');
    Route::get('/cadastrar', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{cargo_id}/editar', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/{cargo_id}/delete', 'delete')->name('delete');
});

Route::prefix('classificacao')->name('classificacao.')->controller(ClassificacaoController::class)->group(function () {
    Route::get('/listar', 'index')->name('index');
    Route::get('/cadastrar', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{classificacao_id}/editar', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::delete('/{classificacao_id}/delete', 'delete')->name('delete');
});

Route::prefix('servidor')->name('servidor.')->controller(ServidorController::class)->group(function () {
    Route::get('/listar', 'index')->name('index');
    Route::get('/cadastrar', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{servidor_id}/editar', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/{servidor_id}/delete', 'delete')->name('delete');
    Route::get('/{servidor_id}/restore', 'restore')->name('restore');
});

Route::prefix('setor')->name('setor.')->controller(SetorController::class)->group(function () {
    Route::get('/listar/{setor_pai_id?}', 'index')->name('index');
    Route::get('/cadastrar/{setor_pai_id?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{setor_id}/editar', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/{setor_id}/delete', 'delete')->name('delete');
    // Route::get('/{setor_id}/restore', [SetorController::class, 'restore'])->name('restore');
});

Route::prefix('patrimonio')->name('patrimonio.')->controller(PatrimonioController::class)->group(function () {
    Route::get('/listar', 'index')->name('index');
    Route::get('/cadastrar', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{patrimonio_id}/editar', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::get('/{patrimonio_id}/delete', 'delete')->name('delete');
    Route::get('/{patrimonio_id}/restore', 'restore')->name('restore');
    Route::get('/{patrimonio_id}/codigos', 'codigosPatrimonio')->name('codigo.index');
    Route::get('/codigos/{codigo_id}/delete', 'codigoDelete')->name('codigo.delete');
    Route::post('/codigo/store', 'codigoStore')->name('codigo.store');
    Route::get('/busca', 'busca')->name('busca.get');

    Route::get('/getSalas', 'getSalas')->name('getSalas');
    Route::get('/gerar-relatorio-patrimonio', 'gerarRelatorio')->name('pdf.patrimonio');
});

Route::prefix('movimento')->name('movimento.')->controller(MovimentoController::class)->group(function () {
    Route::get('/listar', 'index')->name('index');
    Route::get('/cadastrar', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{movimento_id}/editar', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/{movimento_id}/delete', 'delete')->name('delete');
    Route::get('/{movimento_id}/restore', 'restore')->name('restore');
    Route::post('/store/patrimonio', 'adicionarPatrimonio')->name('patrimonio.store');
    Route::post('/concluir', 'concluirMovimentacao')->name('concluir');
    Route::get('/delete/patrimonio/{movimento_patrimonio_id}', 'removerPatrimonio')->name('patrimonio.delete');
});
