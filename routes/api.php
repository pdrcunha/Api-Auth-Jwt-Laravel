<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('api')->prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login',  'login');
        Route::get('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::get('me',  'me');
    });
});

Route::middleware('api')->prefix('user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('criar',  'store');
        Route::get('ver/{id}', 'show');
        Route::put('mudar/{id}', 'update');
        Route::delete('deletar/{id}',  'destroy');
    });
});

Route::middleware('api')->prefix('prodcts')->group(function () {
    Route::controller(ProdutoController::class)->group(function () {
        Route::post('criar',  'store');
        Route::get('ver/{id}', 'show');
        Route::put('mudar/{id}', 'update');
        Route::delete('deletar/{id}',  'destroy');
    });
});