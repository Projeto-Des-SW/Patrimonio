<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('predio/listar', [\App\Http\Controllers\PredioController::class, 'index'])->name('predio.index');
Route::get('predio/cadastrar', [\App\Http\Controllers\PredioController::class, 'create'])->name('predio.create');
Route::post('predio/store', [\App\Http\Controllers\PredioController::class, 'store'])->name('predio.store');
Route::get('predio/{predio_id}/editar', [\App\Http\Controllers\PredioController::class, 'edit'])->name('predio.edit');
Route::post('predio/update', [\App\Http\Controllers\PredioController::class, 'update'])->name('predio.update');
Route::get('predio/{predio_id}/delete', [\App\Http\Controllers\PredioController::class, 'delete'])->name('predio.delete');

Route::get('predio/{predio_id}/sala/listar', [\App\Http\Controllers\SalaController::class, 'index'])->name('sala.index');
Route::get('predio/{predio_id}/sala/cadastrar', [\App\Http\Controllers\SalaController::class, 'create'])->name('sala.create');
Route::post('sala/store', [\App\Http\Controllers\SalaController::class, 'store'])->name('sala.store');
Route::get('sala/{sala_id}/editar', [\App\Http\Controllers\SalaController::class, 'edit'])->name('sala.edit');
Route::post('sala/update', [\App\Http\Controllers\SalaController::class, 'update'])->name('sala.update');
Route::get('sala/{sala_id}/delete', [\App\Http\Controllers\SalaController::class, 'delete'])->name('sala.delete');

Route::get('cargo/listar', [\App\Http\Controllers\CargoController::class, 'index'])->name('cargo.index');
Route::get('cargo/cadastrar', [\App\Http\Controllers\CargoController::class, 'create'])->name('cargo.create');
Route::post('cargo/store', [\App\Http\Controllers\CargoController::class, 'store'])->name('cargo.store');
Route::get('cargo/{cargo_id}/editar', [\App\Http\Controllers\CargoController::class, 'edit'])->name('cargo.edit');
Route::post('cargo/update', [\App\Http\Controllers\CargoController::class, 'update'])->name('cargo.update');
Route::get('cargo/{cargo_id}/delete', [\App\Http\Controllers\CargoController::class, 'delete'])->name('cargo.delete');

Route::get('classificacao/listar', [\App\Http\Controllers\ClassificacaoController::class, 'index'])->name('classificacao.index');
Route::get('classificacao/cadastrar', [\App\Http\Controllers\ClassificacaoController::class, 'create'])->name('classificacao.create');
Route::post('classificacao/store', [\App\Http\Controllers\ClassificacaoController::class, 'store'])->name('classificacao.store');
Route::get('classificacao/{classificacao_id}/editar', [\App\Http\Controllers\ClassificacaoController::class, 'edit'])->name('classificacao.edit');
Route::post('classificacao/update', [\App\Http\Controllers\ClassificacaoController::class, 'update'])->name('classificacao.update');
Route::get('classificacao/{classificacao_id}/delete', [\App\Http\Controllers\ClassificacaoController::class, 'delete'])->name('classificacao.delete');

Route::get('servidor/listar', [\App\Http\Controllers\ServidorController::class, 'index'])->name('servidor.index');
Route::get('servidor/cadastrar', [\App\Http\Controllers\ServidorController::class, 'create'])->name('servidor.create');
Route::post('servidor/store', [\App\Http\Controllers\ServidorController::class, 'store'])->name('servidor.store');
Route::get('servidor/{servidor_id}/editar', [\App\Http\Controllers\ServidorController::class, 'edit'])->name('servidor.edit');
Route::post('servidor/update', [\App\Http\Controllers\ServidorController::class, 'update'])->name('servidor.update');
Route::get('servidor/{servidor_id}/delete', [\App\Http\Controllers\ServidorController::class, 'delete'])->name('servidor.delete');
Route::get('servidor/{servidor_id}/restore', [\App\Http\Controllers\ServidorController::class, 'restore'])->name('servidor.restore');




