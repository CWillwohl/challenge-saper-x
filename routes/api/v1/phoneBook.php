<?php

use App\Http\Controllers\Api\V1\ApiContactController;
use App\Http\Controllers\Api\V1\ApiPhoneBookController;
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

Route::as('api.phoneBook.')->group(function () {
    Route::get('/', [ApiPhoneBookController::class, 'index'])->name('index');
    Route::post('/store', [ApiPhoneBookController::class, 'store'])->name('store');
    Route::get('/{phoneBook}', [ApiPhoneBookController::class, 'show'])->name('show');
    Route::put('/{phoneBook}', [ApiPhoneBookController::class, 'update'])->name('update');
    Route::delete('/{phoneBook}', [ApiPhoneBookController::class, 'destroy'])->name('destroy');
});
