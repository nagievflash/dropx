<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/telegram/redirect', [App\Http\Controllers\AuthController::class, 'getUser'])->name('getuser');
Route::get('/telegram/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('index')->middleware('admin');
Route::post('/api/deposit', [App\Http\Controllers\ApiController::class, 'deposit'])
    ->name('deposit');
Route::post('/api/withdraw', [App\Http\Controllers\ApiController::class, 'withdraw'])
    ->name('withdraw');
Route::get('/', function () {
    return view('welcome');
});
