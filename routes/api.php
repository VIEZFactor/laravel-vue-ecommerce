<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('signup', [App\Http\Controllers\AuthController::class, 'signUp']);

Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('products/{id}/show', [App\Http\Controllers\ProductController::class, 'show']);

Route::group([
    'middleware' => 'auth:api'
], function() {
    Route::post('products', [App\Http\Controllers\ProductController::class, 'store']);
    Route::get('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::put('products/{id}', [App\Http\Controllers\ProductController::class, 'update']);
    Route::delete('products/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);
    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    //Route::get('user', [App\Http\Controllers\AuthController::class, 'user']);    
    Route::get('users', [App\Http\Controllers\AuthController::class, 'users']);
    Route::get('users/{id}/edit', [App\Http\Controllers\AuthController::class, 'edit']);
    Route::put('users/{id}', [App\Http\Controllers\AuthController::class, 'update']);
    Route::delete('users/{id}', [App\Http\Controllers\AuthController::class, 'destroy']);
});

//Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
//Route::resource('/products', ProductController::class);
