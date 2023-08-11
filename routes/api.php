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

// Grup rute untuk pengguna dengan peran 'user'
Route::prefix('user')->name('user.')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logoutUser'])->name('logout');

});

// Grup rute untuk pengguna dengan peran 'owner'
Route::prefix('owner')->name('owner.')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logoutOwner'])->name('logout');
    Route::middleware('auth:sanctum')->get('/detail', [AuthController::class, 'getOwnerDetail'])->name('owner.detail');
});

    //product
  Route::middleware(['auth:sanctum', 'role:owner'])->post('/addproduct', [ProductController::class, 'store']);
  Route::get('/allproduct', [ProductController::class, 'product']);
  Route::get('/product/search', [ProductController::class, 'search']);
  Route::get('/getoneproduct/{id}', [ProductController::class, 'getproduct']);
  Route::middleware('auth:sanctum')->put('/product/{product}/edit',[ProductController::class, 'editAndUpdate']);
  Route::middleware('auth:sanctum')->delete('/product/{id}', [ProductController::class, 'destroy']);
  Route::middleware('auth:sanctum')->post('/product/{id}/favorite', [ProductController::class, 'favorite']);
  Route::middleware('auth:sanctum')->get('/getfavorite', [ProductController::class, 'getFavorites']);
  Route::middleware('auth:sanctum')->get('/productowner', [ProductController::class, 'productowner']);
    //review
  Route::middleware(['auth:sanctum', 'role:user'])->post('addreview', [ReviewController::class, 'addreview']);
  Route::get('review', [ReviewController::class, 'review']);
  Route::middleware('auth:sanctum')->delete('/review/{id}', [ReviewController::class, 'destroy']);


// Route::get('search/{nama_kos}', [ProductController::class, 'search']);
// Route::put('update', [ProductController::class, 'update']);
// Route::get('getproduct',[ProductController::class, 'getproduct']);
//review
// Route::post('addreview', [ReviewController::class, 'addreview']);

//getuser
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans-callback', [OrderController::class, 'callback']);
// Route::post('/checkout', [OrderController::class, 'checkout']);
Route::middleware('auth:sanctum')->post('/checkout', [OrderController::class, 'checkout']);


