<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
        Route::middleware(['auth:web'])->group(function(){
            Route::get('dashboard',[MainController::class, 'dashboard'])->name('dashboard');
            Route::get('dashboard-visitor',[MainController::class, 'dashboard_visitor'])->name('dashboard-visitor');
            Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');
        });
    });
    Route::get('verification',[AuthController::class, 'verification'])->name('verification.notice');
    Route::get('migrate', function(){
        Artisan::call('migrate');
        return response()->json([
            'alert' => 'success',
            'message' => 'DB Migrate!'
        ]);
    })->name('db.migrate');
    Route::get('storage-link', function(){
        Artisan::call('storage:link');
        return response()->json([
            'alert' => 'success',
            'message' => 'Storage Linked!'
        ]);
    })->name('storage.link');
    Route::get('db-seed', function(){
        Artisan::call('db:seed');
        return response()->json([
            'alert' => 'success',
            'message' => 'DB Seed!'
        ]);
    })->name('db.seed');
});