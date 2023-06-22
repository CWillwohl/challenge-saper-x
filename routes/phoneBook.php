<?php

use App\Http\Controllers\PhoneBookController;
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

Route::prefix('/lista-telefonica')->as('phoneBook.')->group(function () {
    Route::get('/', [PhoneBookController::class, 'index'])->name('index');
    Route::get('/cadastrar-lista', [PhoneBookController::class, 'create'])->name('create');
    Route::post('/store', [PhoneBookController::class, 'store'])->name('store');
    Route::get('/{phoneBook}', [PhoneBookController::class, 'show'])->name('show');
    Route::get('/{phoneBook}/editar', [PhoneBookController::class, 'edit'])->name('edit');
    Route::put('/{phoneBook}', [PhoneBookController::class, 'update'])->name('update');
    Route::delete('/{phoneBook}', [PhoneBookController::class, 'destroy'])->name('destroy');
});
