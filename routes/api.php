<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CustomersController;

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

Route::get('customers',[CustomersController::class, 'index']);
Route::get('address',[AddressController::class, 'index']);
Route::get('customers/{id}',[CustomersController::class, 'show']);
Route::get('address/{id}',[AddressController::class, 'show']);
Route::delete('delete/customers/{id}',[CustomersController::class, 'destroy']);
Route::delete('delete/address/{id}',[AddressController::class, 'destroy']);
Route::post('add/customers',[CustomersController::class, 'store']);
Route::post('add/address',[AddressController::class, 'store']);
Route::patch('update/customers/{id}',[CustomersController::class, 'update']);
Route::patch('update/address/{id}',[AddressController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
