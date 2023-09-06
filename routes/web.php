<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users')->middleware('auth');
Route::post('/users', [App\Http\Controllers\UserController::class, 'saveUser'])->name('users')->middleware('auth');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'editUser'])->name('editUsers')->middleware('auth');
Route::post('/users/{id}', [App\Http\Controllers\UserController::class, 'editUserSave'])->name('editUsersSave')->middleware('auth');
Route::get('/reset_password/{id}', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('resetPassword')->middleware('auth');
Route::post('/reset_password/{id}', [App\Http\Controllers\UserController::class, 'resetPasswordSave'])->name('resetPassword')->middleware('auth');

Route::get('/chart', [App\Http\Controllers\UserController::class, 'chart'])->name('chart')->middleware('auth');
Route::get('/report', [App\Http\Controllers\UserController::class, 'report'])->name('report')->middleware('auth');

Route::get('/users/export/', [App\Http\Controllers\UsersController::class, 'export'])->name('export')->middleware('auth');

Route::get('/password/reset', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/register', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/boostrap-modal','livewire.home');
