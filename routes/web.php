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

Route::get('dashboard', [WebController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('login', [WebController::class, 'login'])->name('login');
Route::post('login-submit', [WebController::class, 'login_submit'])->name('login_submit');

Route::get('logout', [WebController::class, 'logout'])->name('logout');

Route::get('registration', [WebController::class, 'registration'])->name('registration');
Route::post('submition', [WebController::class, 'submition'])->name('submition');

Route::get('/registration/verify/{token}/{email}', [WebController::class, 'resgistration_verify']);

Route::get('forget-password', [WebController::class, 'forget_password'])->name('forget_password');
Route::get('forget-password-submit', [WebController::class, 'forget_password_submit'])->name('forget_password_submit');