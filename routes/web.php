<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MousController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MethodsController;
use App\Http\Controllers\InvoicesController;

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
Route::group(['middleware' => "guest"], function () {
    Route::get('/', function () {
        return view('auth.ori');
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => "auth"], function () {
    Route::prefix('items')->name('items.')->group(function () {
        Route::get('', [ItemsController::class, 'index'])->name('index');
        Route::post('store', [ItemsController::class, 'store'])->name('tambah');
        Route::put('update', [ItemsController::class, 'update'])->name('edit');
        Route::delete('delete', [ItemsController::class, 'delete'])->name('hapus');
    });
    Route::prefix('mous')->name('mous.')->group(function () {
        Route::get('', [MousController::class, 'index'])->name('index');
        Route::post('store', [MousController::class, 'store'])->name('tambah');
        Route::put('update', [MousController::class, 'update'])->name('edit');
        Route::delete('delete', [MousController::class, 'delete'])->name('hapus');
    });
    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('', [InvoicesController::class, 'index'])->name('index');
        Route::get('getItemsMethods', [InvoicesController::class, 'getItemsMethods'])->name('getItemsMethods');
        Route::post('store', [InvoicesController::class, 'store'])->name('tambah');
        Route::put('update', [InvoicesController::class, 'update'])->name('edit');
        Route::delete('delete', [InvoicesController::class, 'delete'])->name('hapus');
    });
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('', [UsersController::class, 'index'])->name('index');
        Route::post('store', [UsersController::class, 'store'])->name('tambah');
        Route::put('update', [UsersController::class, 'edit'])->name('edit');
        Route::put('editRole', [UsersController::class, 'update'])->name('editRole');
        Route::put('editPermissions', [UsersController::class, 'updateP'])->name('editPermissions');
        Route::delete('delete', [UsersController::class, 'destroy'])->name('hapus');
    });
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('', [App\Http\Controllers\RolesController::class, 'index'])->name('index');
        Route::post('store', [App\Http\Controllers\RolesController::class, 'store'])->name('tambah');
        Route::put('update', [App\Http\Controllers\RolesController::class, 'update'])->name('edit');
        Route::delete('delete', [App\Http\Controllers\RolesController::class, 'delete'])->name('hapus');
    });
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('', [App\Http\Controllers\PermissionsController::class, 'index'])->name('index');
        Route::post('store', [App\Http\Controllers\PermissionsController::class, 'store'])->name('tambah');
        Route::put('update', [App\Http\Controllers\PermissionsController::class, 'update'])->name('edit');
        Route::delete('delete', [App\Http\Controllers\PermissionsController::class, 'delete'])->name('hapus');
    });
    Route::prefix('methods')->name('methods.')->group(function () {
        Route::get('', [MethodsController::class, 'index'])->name('index');
        Route::post('store', [MethodsController::class, 'store'])->name('tambah');
        Route::put('update', [MethodsController::class, 'update'])->name('edit');
        Route::delete('delete', [MethodsController::class, 'delete'])->name('hapus');
    });
});

// Route::group(['middleware' => ['auth']], function() {
//     Route::group([])
// })
