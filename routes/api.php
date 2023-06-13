<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/
Route::post('register/user', [AuthController::class, 'register']);
Route::post('login/user', [AuthController::class, 'login']);
Route::post('logout/user', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);

Route::post('store', [ProductController::class, 'store']);

Route::get('product', [ProductController::class, 'product']);
// Route::put('update', [ProductController::class, 'update']);
// Route::get('getproduct',[ProductController::class, 'getproduct']);

Route::get('review', [ReviewController::class, 'review']);
Route::post('addreview', [ReviewController::class, 'addreview']);

Route::middleware('auth:sanctupm')->get('/user', function (Request $request) {
    return $request->user();
});
