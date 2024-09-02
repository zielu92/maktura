<?php

use Illuminate\Support\Facades\Route;
use Modules\Payments\App\Http\Controllers\PaymentsController;
use Modules\Payments\App\Http\Controllers\TransferController;

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
Route::middleware('auth')->group(function () {
    Route::group([], function () {
        Route::resource('payments', PaymentsController::class)->names('payments');
        Route::resource('transfer', TransferController::class)->names('payments.transfer')->except('create');
        Route::get('/transfer/create/{id}', [TransferController::class, 'create'])->name('payments.transfer.create');
    });
});
