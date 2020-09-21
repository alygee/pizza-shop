<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, UserController, ProductController};

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

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('refresh', [AuthController::class, 'refresh']);
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', [AuthController::class, 'user']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('users', [UserController::class, 'index'])->middleware('isAdmin');
    Route::get('users/{id}', [UserController::class, 'show'])->middleware('isAdminOrSelf');
});

Route::resource('products', ProductController::class)->only(['index', 'store', 'update', 'show']);

