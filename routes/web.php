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
        //RUTAS USUARIOS
        Route::get('/usuarios', [App\Http\Controllers\Admin\UsuariosController::class, 'index']);
        Route::get('/usuarios/lista_usuarios', [App\Http\Controllers\Admin\UsuariosController::class, 'getDataUsuarios']);
        Route::get('/usuarios/create', [App\Http\Controllers\Admin\UsuariosController::class, 'create']);
        Route::post('/usuarios/store', [App\Http\Controllers\Admin\UsuariosController::class, 'store']);
        Route::get('/usuarios/edit/{id}', [App\Http\Controllers\Admin\UsuariosController::class,'edit']);
        Route::post('/usuarios/update/{id}',[App\Http\Controllers\Admin\UsuariosController::class, 'update']);
        Route::get('/usuarios/detalle_usuario/{id}', [\App\Http\Controllers\Admin\UsuariosController::class, 'view']);
        //RUTAS ROLES
        Route::get('/perfiles', [\App\Http\Controllers\Admin\RolesController::class, 'index']);
        Route::get('/perfiles/create', [\App\Http\Controllers\Admin\RolesController::class, 'create']);
        Route::post('/perfiles/store', [\App\Http\Controllers\Admin\RolesController::class, 'store']);
        Route::get('/perfiles/editar_perfil/{id}', [\App\Http\Controllers\Admin\RolesController::class, 'edit']);
        Route::post('/perfiles/update/{id}', [\App\Http\Controllers\Admin\RolesController::class, 'update']);
        //RUTAS PERMISOS
        Route::get('/permisos', [\App\Http\Controllers\Admin\PermisosController::class, 'index']);
        Route::get('/permisos/lista_permisos', [App\Http\Controllers\Admin\PermisosController::class, 'lista_permisos']);
        Route::get('/permisos/create', [\App\Http\Controllers\Admin\PermisosController::class, 'create']);
        Route::post('/permisos/store', [\App\Http\Controllers\Admin\PermisosController::class, 'store']);
        Route::get('/permisos/edit/{id}', [\App\Http\Controllers\Admin\PermisosController::class, 'edit']);
        Route::post('/permisos/update/{id}', [\App\Http\Controllers\Admin\PermisosController::class, 'update']);
    });

});
