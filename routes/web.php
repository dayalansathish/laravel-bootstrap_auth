<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.content');
    })->name('dashboard');

    Route::get('/user-list', function () {
        return view('pages.ecom');
    })->name('user-list');

    Route::get('/marketing', function () {
        return view('pages.market');
    })->name('marketing');

    Route::get('/create-customer', function () {
        return view('pages.createcustomer');
    })->name('create-customer');

    Route::get('/customer-details', function(){
        return view('pages.customers');
    })->name('customer-details');

    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit']);


    Route::post('/store/customers', [CustomerController::class, 'store']);
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/{id}', [CustomerController::class, 'show']);
    Route::post('/customer/{id}/update', [CustomerController::class, 'update']);
    Route::post('/customers/{id}', [CustomerController::class, 'destroy']);


// Route::get('/forbidden', function () {
//     abort(403);
// });

});

