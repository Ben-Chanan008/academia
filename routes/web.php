<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
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
    return view('home');
})->middleware('auth');

Route::get('login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::get('register', [UserController::class, 'register']);

Route::get('auth/{provider}/redirect', [SocialController::class, 'redirect'])->middleware('guest');
Route::get('auth/{provider}/callback', [SocialController::class, 'callback'])->middleware('guest');

Route::post('authenticate/local', [UserController::class, 'authenticate']);
Route::post('register/local', [UserController::class, 'store']);

Route::get('logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('user/profile', [UserController::class, 'profile'])->middleware('auth');

Route::post('profile/update', [UserController::class, 'update_profile'])->middleware('auth');
Route::get('wallet', [WalletController::class, 'index'])->middleware('auth');

Route::post('card/register', [WalletController::class, 'store'])->middleware('auth');

Route::get('transaction', [TransactionController::class, 'index'])->middleware('auth');
Route::post('transaction/card', [TransactionController::class, 'card'])->middleware('auth');

Route::post('income/add', [TransactionController::class, 'income'])->middleware('auth');

Route::get('transactions/expenses', [TransactionController::class, 'expenses'])->middleware('auth');
