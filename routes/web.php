<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

Route::get('/{any?}', function (){
    return view('spa');
})->where('any', '^(?!(api|storage|cart)\/)[\/\w\.-]*');

Route::get('cart/list', [CartController::class, 'list']);
Route::post('cart/{id}', [CartController::class, 'add']);
Route::put('cart/update', [CartController::class, 'update']);
Route::put('cart/currency', [CartController::class, 'currency']);
