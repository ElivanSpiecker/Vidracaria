<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\MateriaisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutosController;
use App\Models\Fornecedores;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/fornecedores", FornecedoresController::class)->middleware(['auth', 'verified']);

Route::get('/listF', [FornecedoresController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('listF');

Route::resource("/clientes", ClientesController::class)->middleware(['auth', 'verified']);

Route::resource("/admin", AdminController::class)->middleware(['auth', 'verified']);

Route::get('/listC', [ClientesController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('listC');

Route::resource("/materiais", MateriaisController::class)->middleware(['auth', 'verified']);

Route::get('/listM', [MateriaisController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('listM');

    Route::resource("/itens", ItensController::class)->middleware(['auth', 'verified']);

Route::get('/listI', [ItensController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('listI');

    Route::resource("/produtos", ProdutosController::class)->middleware(['auth', 'verified']);

Route::get('/listP', [ProdutosController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('listP');    

require __DIR__.'/auth.php';
