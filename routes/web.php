<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/categorias' , [CategoriasController::class, 'show'])->name('categorias.show');
Route::get('/categoria/create' , [CategoriasController::class, 'createView'])->name('categoria.createView');

Route::post('/categoria/create' , [CategoriasController::class, 'create'])->name('categoria.create');
Route::get('/categoria/update/{categoriaId}' , [CategoriasController::class, 'updateView'])->name('categoria.updateView');

Route::post('/categoria/update/{categoriaId}', [CategoriasController::class, 'update'])->name('categoria.update');
Route::post('/categoria/{categoriaId}' , [CategoriasController::class , 'delete'])->name('categoria.delete');


Route::get('/produtos/create' , [ProdutosController::class , 'createView'])->name('produto.createView');
Route::get('/produtos/update/{produtoId}' , [ProdutosController::class , 'updateView'])->name('produto.updateView');

Route::get('/produtos' , [ProdutosController::class, 'show'])->name('produtos.show');
Route::post('/produto/create' , [ProdutosController::class, 'create'])->name('produto.create');
Route::post('/produto/{produtoId}' , [ProdutosController::class , 'delete'])->name('produto.delete');
Route::post('/produtos/update/{produtoID}' , [ProdutosController::class, 'update'])->name('produto.update');
