<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;

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

Route::resource('/', UsuariosController::class);

Auth::routes();

Route::get('/', [UsuariosController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [UsuariosController::class, 'index'])->name('home');
});

Route::resource('index', UsuariosController::class)->middleware('auth');

Auth::routes(['register'=>false, 'reset'=>false]);

