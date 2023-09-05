<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {return view('welcome');});
Route::get('/finish', function () {return view('finish');
});
Route::get('/payment/{id}', [OrderController::class, 'index']);
Route::post('/checkout', [OrderController::class, 'checkout']);
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', [DashboardController::class, 'user'])->name('users');
    Route::get('/approved-products', [DashboardController::class, 'product_true'])->name('approvedProducts');
    Route::get('/unapproved-products', [DashboardController::class, 'product_false'])->name('unapprovedProducts');
    Route::get('/all-products', [DashboardController::class, 'product'])->name('allProducts');

    Route::get('/approve/{product}', [DashboardController::class, 'approve']);
    Route::get('/unapprove/{product}', [DashboardController::class, 'unapprove']);
});



