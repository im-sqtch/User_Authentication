<?php

use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('dashboard', [WebController::class, 'dashboard'])->name('dashboard');

Route::get('login', [WebController::class, 'login'])->name('login');

Route::get('registration', [WebController::class, 'registration'])->name('registration');

Route::get('forget-password', [WebController::class, 'forget_password'])->name('forget_password');