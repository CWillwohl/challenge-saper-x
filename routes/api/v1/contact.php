<?php

use App\Http\Controllers\Api\V1\ApiContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::as('api.contact.')->group(function () {
    Route::get('/agenda/{id}/listar-contatos', [ApiContactController::class, 'index'])->name('index');
    Route::post('/agenda/{id}/store', [ApiContactController::class, 'store'])->name('store');
    Route::put('/agenda/{id}/update/{contact}', [ApiContactController::class, 'update'])->name('update');
    Route::delete('/agenda/{id}/delete/{contact}', [ApiContactController::class, 'destroy'])->name('destroy');
});
