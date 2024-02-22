<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentMethodController;

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
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //invoice
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/show/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');


    //buyer
    Route::get('/buyer', [BuyerController::class, 'index'])->name('buyer.index');
    Route::get('/buyer/create', [BuyerController::class, 'create'])->name('buyer.create');
    Route::post('/buyer/store', [BuyerController::class, 'store'])->name('buyer.store');
    Route::get('/buyer/show/{id}', [BuyerController::class, 'show'])->name('buyer.show');
    Route::get('/buyer/edit/{id}', [BuyerController::class, 'edit'])->name('buyer.edit');
    Route::patch('/buyer/{id}', [BuyerController::class, 'update'])->name('buyer.update');
    Route::delete('/buyer/{id}', [BuyerController::class, 'destroy'])->name('buyer.destroy');

    //payment method
    Route::get('/payment', [PaymentMethodController::class, 'index'])->name('payment.index');
    Route::get('/payment/create', [PaymentMethodController::class, 'create'])->name('payment.create');
    Route::post('/payment/store', [PaymentMethodController::class, 'store'])->name('payment.store');
    Route::get('/payment/show/{id}', [PaymentMethodController::class, 'show'])->name('payment.show');
    Route::get('/payment/edit/{id}', [PaymentMethodController::class, 'edit'])->name('payment.edit');
    Route::patch('/payment', [PaymentMethodController::class, 'update'])->name('payment.update');
    Route::delete('/payment', [PaymentMethodController::class, 'destroy'])->name('payment.destroy');

});

require __DIR__.'/auth.php';
