<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
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

Route::middleware('auth')->as('contact.')->group(function () {
    Route::get('/agenda/{phoneBook}/listar-contatos', [ContactController::class, 'index'])->name('index');
    Route::get('/agenda/{phoneBook}/cadastrar-contato', [ContactController::class, 'create'])->name('create');
    Route::post('/agenda/{phoneBook}/store', [ContactController::class, 'store'])->name('store');
    Route::get('/agenda/{phoneBook}/editar-contato/{contact}', [ContactController::class, 'edit'])->name('edit');
    Route::put('/agenda/{phoneBook}/update/{contact}', [ContactController::class, 'update'])->name('update');
    Route::delete('/agenda/{phoneBook}/delete/{contact}', [ContactController::class, 'destroy'])->name('destroy');
});
