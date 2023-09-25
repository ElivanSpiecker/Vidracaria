<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\MateriaisController;
use App\Http\Controllers\ProfileController;
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

Route::get('/listC', [ClientesController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('listC');

Route::resource("/materiais", MateriaisController::class)->middleware(['auth', 'verified']);

Route::get('/listM', [MateriaisController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('listM');

require __DIR__.'/auth.php';
