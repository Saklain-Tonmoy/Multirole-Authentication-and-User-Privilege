<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Middleware\UserMiddleware;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'register' => false,
]);

Route::get('/forgot-password', function() {
    return view('auth.passwords.reset');
})->middleware('guest')->name('password.request');


// Route::group(['middleware' => 'auth'], function() {
//     Route::group(['as' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [AdminMiddleware::class]], function() {
//         Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
//     });
// });

Route::group(['as' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [AdminMiddleware::class]], function() {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index.users');
    Route::get('add-user', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create.user');
    Route::post('store-user', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store.user');
    Route::get('user/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('show.user');
    Route::get('user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit.user');
    Route::put('user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update.user');
    Route::delete('user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('delete.user');
});

Route::group(['as' => 'manager', 'prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => [ManagerMiddleware::class]], function() {
    Route::get('dashboard', [App\Http\Controllers\Manager\DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['as' => 'user', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => [UserMiddleware::class]], function() {
    Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
});
