<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\MainController;

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
Route::group(['domain' => ''], function() {
    Route::prefix('')->name('web.')->group(function(){
        Route::get('',[MainController::class, 'index'])->name('index');
        Route::get('reload-captcha', [MainController::class, 'reloadCaptcha'])->name('captcha');
        Route::prefix('auth')->name('auth.')->group(function(){
            Route::get('',[AuthController::class, 'index'])->name('index');
            Route::post('login',[AuthController::class, 'do_login'])->name('login');
            Route::post('register',[AuthController::class, 'do_register'])->name('register');
            Route::get('verify/{auth:email}',[AuthController::class, 'do_verify'])->name('verify');
        });
        Route::middleware(['auth:web','verified'])->group(function(){
        });
    });
});