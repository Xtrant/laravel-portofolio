<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\depanController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\pengaturanHalamanController;
use App\Http\Controllers\profilController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/', [depanController::class,"index"]);

Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class,"index"])->name('login') -> middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"]) -> middleware('guest');
Route::get('/auth/callback',[authController::class, "callback"]) -> middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);


Route::prefix('dashboard')->middleware('auth')->group(
    function(){
        Route::get('/',[halamanController::class, 'index']);
        Route::resource('halaman', halamanController::class);
        Route::resource('education', educationController::class);   
        Route::get('profile', [profilController::class, 'index']) ->name('profile.index');
        Route::post('profile', [profilController::class, 'update'])->name('profile.update');
        Route::get('setting', [pengaturanHalamanController::class, 'index']) ->name('pengaturanHalaman.index');
        Route::post('setting', [pengaturanHalamanController::class, 'update'])->name('pengaturanHalaman.update');
    }
);
