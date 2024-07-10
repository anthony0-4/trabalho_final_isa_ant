<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\LivrariaController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\VendaController;
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


    Route::post('/categoria/search', [CategoriaController::class, "search"])->name('categoria.search');
    Route::resource('categoria', CategoriaController::class);


    Route::post('/livros/search', [LivrosController::class, "search"])->name('livros.search');
    Route::get('/livros/report', [LivrosController::class, "report"])->name('livros.report');
    Route::resource('livros', LivrosController::class);

    Route::post('/livraria/search', [LivrariaController::class, "search"])->name('livraria.search');
    Route::get('/livraria/report', [LivrariaController::class, "report"])->name('livraria.report');
    Route::resource('livraria', LivrariaController::class);

    Route::post('/venda/search', [VendaController::class, "search"])->name('venda.search');
    Route::resource('venda', VendaController::class);

    Route::post('/comentarios/search', [ComentariosController::class, "search"])->name('comentarios.search');
    Route::resource('comentarios', ComentariosController::class);


