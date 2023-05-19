<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CallsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NextCallDateController;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['AuthMiddleware'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('customer', CustomersController::class);

    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::get('/customers/{id}', [CustomersController::class, 'show'])->name('customer.show');
    Route::get('/create/customer', [CustomersController::class, 'create'])->name('customer.create');
    Route::post('/customers', [CustomersController::class, 'store'])->name('customer.store');
    Route::get('/customers/{customer}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomersController::class, 'update'])->name('customer.update');
    Route::delete('/customers/{customer}', [CustomersController::class, 'destroy'])->name('customer.destroy');

    //calls routes
    Route::get('/customers/{customer}/calls', [CallsController::class, 'index'])->name('calls.index');
    Route::get('/customers/{customer}/calls/create', [CallsController::class, 'create'])->name('calls.create');
    Route::post('/customers/{customer}/calls', [CallsController::class, 'store'])->name('calls.store');
    Route::get('/customers/{customer}/calls/{call}/edit', [CallsController::class, 'edit'])->name('calls.edit');
    Route::put('/customers/{customer}/calls/{call}', [CallsController::class, 'update'])->name('calls.update');
    Route::delete('/customers/{customer}/calls/{call}', [CallsController::class, 'destroy'])->name('calls.destroy');

    Route::get('/customers/search', [CallsController::class, 'search'])->name('customers.search');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/intersted', [DashboardController::class, 'intersted'])->name('intersted');
    Route::get('/next-call-date', [NextCallDateController::class, 'next_call_date'])->name('next_call_date');
});
