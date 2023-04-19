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

Route::get('/', [App\Http\Controllers\HomeController::class, 'vista'])->name('vista');

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/crear-usuario', [App\Http\Controllers\HomeController::class, 'crear_usuario'])->name('crear_usuario');
    Route::get('/bandeja-usuario', [App\Http\Controllers\HomeController::class, 'bandeja_usuario'])->name('bandeja_usuario');
    
    Route::get('/crear-enlaces', [App\Http\Controllers\HomeController::class, 'crear_enlaces'])->name('crear_enlaces');
    Route::get('/ver-enlaces', [App\Http\Controllers\HomeController::class, 'ver_enlaces'])->name('ver_enlaces');
    Route::get('/bandeja-enlaces', [App\Http\Controllers\HomeController::class, 'bandeja_enlaces'])->name('bandeja_enlaces');
});