<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

    Route::prefix('admin')->group(function(){

        Route::get('/usuarios', [App\Http\Controllers\Admin\UsuariosController::class, 'index']);
        Route::get('/lista_usuarios', [App\Http\Controllers\Admin\UsuariosController::class, 'getDataUsuarios']);
        Route::get('/create', [App\Http\Controllers\Admin\UsuariosController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\Admin\UsuariosController::class, 'store']);

    });

});
