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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::prefix('predio')->name('predio.')->group(function () {
    Route::get('/listar', [PredioController::class, 'index'])->name('index');
    Route::get('/cadastrar', [PredioController::class, 'create'])->name('create');
    Route::post('/store', [PredioController::class, 'store'])->name('store');
    Route::get('/{predio_id}/editar', [PredioController::class, 'edit'])->name('edit');
    Route::put('/update', [PredioController::class, 'update'])->name('update');
    Route::delete('/{predio_id}/delete', [PredioController::class, 'delete'])->name('delete');
});

Route::prefix('predio')->name('sala.')->group(function () {
    Route::get('/{predio_id}/sala/listar', [SalaController::class, 'index'])->name('index');
    Route::get('/{predio_id}/sala/cadastrar', [SalaController::class, 'create'])->name('create');
    Route::post('/sala/store', [SalaController::class, 'store'])->name('store');
    Route::get('/sala/{sala_id}/editar', [SalaController::class, 'edit'])->name('edit');
    Route::post('/sala/update', [SalaController::class, 'update'])->name('update');
    Route::get('/sala/{sala_id}/delete', [SalaController::class, 'delete'])->name('delete');
});

Route::prefix('cargo')->name('cargo.')->group(function () {
    Route::get('/listar', [CargoController::class, 'index'])->name('index');
    Route::get('/cadastrar', [CargoController::class, 'create'])->name('create');
    Route::post('/store', [CargoController::class, 'store'])->name('store');
    Route::get('/{cargo_id}/editar', [CargoController::class, 'edit'])->name('edit');
    Route::post('/update', [CargoController::class, 'update'])->name('update');
    Route::get('/{cargo_id}/delete', [CargoController::class, 'delete'])->name('delete');
});

Route::prefix('classificacao')->name('classificacao.')->group(function () {
    Route::get('/listar', [ClassificacaoController::class, 'index'])->name('index');
    Route::get('/cadastrar', [ClassificacaoController::class, 'create'])->name('create');
    Route::post('/store', [ClassificacaoController::class, 'store'])->name('store');
    Route::get('/{classificacao_id}/editar', [ClassificacaoController::class, 'edit'])->name('edit');
    Route::post('/update', [ClassificacaoController::class, 'update'])->name('update');
    Route::get('/{classificacao_id}/delete', [ClassificacaoController::class, 'delete'])->name('delete');
});

Route::prefix('servidor')->name('servidor.')->group(function () {
    Route::get('/listar', [ServidorController::class, 'index'])->name('index');
    Route::get('/cadastrar', [ServidorController::class, 'create'])->name('create');
    Route::post('/store', [ServidorController::class, 'store'])->name('store');
    Route::get('/{servidor_id}/editar', [ServidorController::class, 'edit'])->name('edit');
    Route::post('/update', [ServidorController::class, 'update'])->name('update');
    Route::get('/{servidor_id}/delete', [ServidorController::class, 'delete'])->name('delete');
    Route::get('/{servidor_id}/restore', [ServidorController::class, 'restore'])->name('restore');
});

Route::prefix('setor')->name('setor.')->group(function () {
    Route::get('/listar/{setor_pai_id?}', [SetorController::class, 'index'])->name('index');
    Route::get('/cadastrar/{setor_pai_id?}', [SetorController::class, 'create'])->name('create');
    Route::post('/store', [SetorController::class, 'store'])->name('store');
    Route::get('/{setor_id}/editar', [SetorController::class, 'edit'])->name('edit');
    Route::post('/update', [SetorController::class, 'update'])->name('update');
    Route::get('/{setor_id}/delete', [SetorController::class, 'delete'])->name('delete');
    Route::get('/{setor_id}/restore', [SetorController::class, 'restore'])->name('restore');
});

Route::prefix('patrimonio')->name('patrimonio.')->group(function () {
    Route::get('/listar', [PatrimonioController::class, 'index'])->name('index');
    Route::get('/cadastrar', [PatrimonioController::class, 'create'])->name('create');
    Route::post('/store', [PatrimonioController::class, 'store'])->name('store');
    Route::get('/{patrimonio_id}/editar', [PatrimonioController::class, 'edit'])->name('edit');
    Route::post('/update', [PatrimonioController::class, 'update'])->name('update');
    Route::get('/{patrimonio_id}/delete', [PatrimonioController::class, 'delete'])->name('delete');
    Route::get('/{patrimonio_id}/restore', [PatrimonioController::class, 'restore'])->name('restore');
    Route::get('/{patrimonio_id}/codigos', [PatrimonioController::class, 'codigosPatrimonio'])->name('codigo.index');
    Route::get('/codigos/{codigo_id}/delete', [PatrimonioController::class, 'codigoDelete'])->name('codigo.delete');
    Route::post('/codigo/store', [PatrimonioController::class, 'codigoStore'])->name('codigo.store');
});

Route::post('patrimonio/getSalas', [PatrimonioController::class, 'getSalas'])->name('getSalas');
Route::get('/gerar-relatorio-patrimonio', [PatrimonioController::class, 'gerarRelatorio'])->name('pdf.patrimonio');     // em observacao

Route::prefix('movimento')->name('movimento.')->group(function () {
    Route::get('/listar', [MovimentoController::class, 'index'])->name('index');
    Route::get('/cadastrar', [MovimentoController::class, 'create'])->name('create');
    Route::post('/store', [MovimentoController::class, 'store'])->name('store');
    Route::get('/{movimento_id}/editar', [MovimentoController::class, 'edit'])->name('edit');
    Route::post('/update', [MovimentoController::class, 'update'])->name('update');
    Route::get('/{movimento_id}/delete', [MovimentoController::class, 'delete'])->name('delete');
    Route::get('/{movimento_id}/restore', [MovimentoController::class, 'restore'])->name('restore');
    Route::post('/store/patrimonio', [MovimentoController::class, 'adicionarPatrimonio'])->name('patrimonio.store');
    Route::post('/concluir', [MovimentoController::class, 'concluirMovimentacao'])->name('concluir');
    Route::get('/delete/patrimonio/{movimento_patrimonio_id}', [MovimentoController::class, 'removerPatrimonio'])->name('patrimonio.delete');
});


// se erro em gerar_relatorio_patrimonio
//      adicionar aqui a rota no final