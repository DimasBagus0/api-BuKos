<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/
// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);

// Grup rute untuk pengguna dengan peran 'user'
Route::prefix('user')->name('user.')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logoutUser'])->name('logout');
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});

// Grup rute untuk pengguna dengan peran 'owner'
Route::prefix('owner')->name('owner.')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logoutOwner'])->name('logout');
    Route::middleware('auth:sanctum')->get('/detail', [AuthController::class, 'getOwnerDetail'])->name('owner.detail');
    Route::middleware(['auth:sanctum', 'role:owner'])->post('store', [ProductController::class, 'store']);
});

Route::get('product', [ProductController::class, 'product']);
// Route::get('search/{nama_kos}', [ProductController::class, 'search']);
Route::get('/products/search', [ProductController::class, 'search']);


// Route::put('update', [ProductController::class, 'update']);
// Route::get('getproduct',[ProductController::class, 'getproduct']);

//review
Route::get('review', [ReviewController::class, 'review']);
Route::post('addreview', [ReviewController::class, 'addreview']);

Route::post('/midtrans-callback', [OrderController::class, 'callback']);

