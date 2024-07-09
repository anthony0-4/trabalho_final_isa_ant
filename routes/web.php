<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\LivrariaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/categoria/search', [CategoriaController::class, "search"])->name('categoria.search');
    Route::resource('categoria', CategoriaController::class);


    Route::post('/livros/search', [LivrosController::class, "search"])->name('livros.search');
    Route::get('/livros/report', [LivrosController::class, "report"])->name('livros.report');
    Route::resource('livros', LivrosController::class);

    Route::post('/livraria/search', [LivrariaController::class, "search"])->name('livraria.search');
    Route::get('/livraria/report', [LivrariaController::class, "report"])->name('livraria.report');
    Route::resource('livraria', LivrariaController::class);
});

require __DIR__.'/auth.php';


