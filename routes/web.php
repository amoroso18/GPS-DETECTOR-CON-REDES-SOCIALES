<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/clear-cache', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('config:cache');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('route:cache');
    $run = Artisan::call('route:clear');
    $run = Artisan::call('view:cache');
    $run = Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'vista'])->name('vista');

Route::get('login', [App\Http\Controllers\UserController::class, 'ingresar'])->name('login');
Route::post('credenciales', [App\Http\Controllers\UserController::class, 'credenciales'])->name('credenciales');

Route::get('/guardar-permisos', [App\Http\Controllers\HomeController::class, 'vista_guardar_permisos'])->name('vista_guardar_permisos');
Route::get('/guardar-ip-location', [App\Http\Controllers\HomeController::class, 'vista_guardar_iplocation'])->name('vista_guardar_iplocation');

Auth::routes();

Route::group(['middleware' => ['auth','estado']], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/crear-usuario', [App\Http\Controllers\HomeController::class, 'crear_usuario'])->name('crear_usuario');
    Route::post('/crear-usuario', [App\Http\Controllers\HomeController::class, 'crear_usuario_save'])->name('crear_usuario_save');
    Route::get('/modificar-usuario', [App\Http\Controllers\HomeController::class, 'modificar_usuario_save'])->name('modificar_usuario_save');
    Route::get('/bandeja-usuario', [App\Http\Controllers\HomeController::class, 'bandeja_usuario'])->name('bandeja_usuario');
    
    Route::get('/crear-enlaces', [App\Http\Controllers\HomeController::class, 'crear_enlaces'])->name('crear_enlaces');
    Route::post('/guardar-enlaces', [App\Http\Controllers\HomeController::class, 'guardar_enlaces'])->name('guardar_enlaces');
    Route::get('/ver-enlaces', [App\Http\Controllers\HomeController::class, 'ver_enlaces'])->name('ver_enlaces');
    
    Route::get('/bandeja-enlaces', [App\Http\Controllers\HomeController::class, 'bandeja_enlaces'])->name('bandeja_enlaces');
});