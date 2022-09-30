<?php

use App\Http\Controllers\ZooCotroller;
use Illuminate\Support\Facades\Auth;
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


Route::middleware('auth')->group(function () {
    Route::get('/', [ZooCotroller::class, 'index'])->name('index');
    Route::get('crear', [ZooCotroller::class, 'crear'])->name('crear');
    Route::get('editar/{id_animal}', [ZooCotroller::class, 'editar'])->name('editar');


    Route::post('guardar', [ZooCotroller::class, 'guardar'])->name('guardar');
    Route::post('actualizar', [ZooCotroller::class, 'actualizar'])->name('actualizar');
    Route::post('eliminar', [ZooCotroller::class, 'eliminar'])->name('eliminar');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
