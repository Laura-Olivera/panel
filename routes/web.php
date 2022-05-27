<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

    Route::prefix('perfil')->group(function(){
        //RUTAS PERFIL DE USUARIO EMPLEADO
        Route::get('/', [App\Http\Controllers\Usuarios\PerfilController::class, 'empleadoPerfil']);
        Route::get('/create', [App\Http\Controllers\Usuarios\PerfilController::class, 'crearContacto']);
        Route::post('/store', [App\Http\Controllers\Usuarios\PerfilController::class, 'storeContacto']);
        Route::get('/edit/{id}', [App\Http\Controllers\Usuarios\PerfilController::class, 'editContacto']);
        Route::post('/update/{id}', [App\Http\Controllers\Usuarios\PerfilController::class, 'updateContacto']);
        Route::post('/delete/{id}', [\App\Http\Controllers\Usuarios\PerfilController::class, 'deleteContacto']);
        Route::get('/viewPassword',[\App\Http\Controllers\Usuarios\PerfilController::class, 'passwordView']);
        Route::post('/resetPassword', [App\Http\Controllers\Usuarios\PerfilController::class, 'passwordReset']);
    });

    Route::prefix('admin')->group(function(){
        //RUTAS USUARIOS
        Route::get('/usuarios', [App\Http\Controllers\Admin\UsuariosController::class, 'index']);
        Route::get('/usuarios/lista_usuarios', [App\Http\Controllers\Admin\UsuariosController::class, 'getDataUsuarios']);
        Route::get('/usuarios/create', [App\Http\Controllers\Admin\UsuariosController::class, 'create']);
        Route::post('/usuarios/store', [App\Http\Controllers\Admin\UsuariosController::class, 'store']);
        Route::get('/usuarios/edit/{id}', [App\Http\Controllers\Admin\UsuariosController::class,'edit']);
        Route::post('/usuarios/update/{id}',[App\Http\Controllers\Admin\UsuariosController::class, 'update']);
        Route::get('/usuarios/detalle_usuario/{id}', [\App\Http\Controllers\Admin\UsuariosController::class, 'viewUsuario']);
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
        //RUTAS CLIENTES 
        Route::get('/clientes', [App\Http\Controllers\Admin\ClientesController::class,'index']);
        Route::get('/clientes/lista_clientes', [App\Http\Controllers\Admin\ClientesController::class, 'lista_clientes']);
        Route::get('/clientes/detalle_cliente/{id}', [App\Http\Controllers\Admin\ClientesController::class, 'show']);
        //RUTAS TAREAS
        Route::get('/tareas', [App\Http\Controllers\Admin\TareasController::class, 'index']);
        Route::get('/tareas/create', [App\Http\Controllers\Admin\TareasController::class, 'create']);
        Route::post('/tareas/store', [App\Http\Controllers\Admin\TareasController::class, 'store']);
        Route::get('tareas/edit/{id}', [App\Http\Controllers\Admin\TareasController::class, 'edit']);
        Route::post('tareas/update/{id}', [App\Http\Controllers\Admin\TareasController::class, 'update']);
        //RUTAS BITACORA USUARIOS
        Route::get('/bitacora_usuarios', [App\Http\Controllers\Admin\BitacoraEmpleadosController::class, 'index']);
        Route::get('/bitacora_usuarios/listar_bitacora', [App\Http\Controllers\Admin\BitacoraEmpleadosController::class, 'listar_bitacora']);
        //RUTAS BITACORA CLIENTES
        Route::get('/bitacora_clientes', [App\Http\Controllers\Admin\BitacoraClientesController::class, 'index']);
        Route::get('/bitacora_clientes/listar_bitacora', [App\Http\Controllers\Admin\BitacoraClientesController::class, 'listar_bitacora']);
        //RUTAS EMPRESA
        Route::get('/empresa', [App\Http\Controllers\Admin\EmpresaController::class, 'index']);
        Route::get('/empresa/edit/{id}', [App\Http\Controllers\Admin\EmpresaController::class, 'edit']);
        Route::post('/empresa/update/{id}', [App\Http\Controllers\Admin\EmpresaController::class, 'update']);
    });

    //RUTAS CATALOGOS
    Route::prefix('catalogos')->group(function (){
        //RUTAS CATEGORIAS        
        Route::get('/categorias', [App\Http\Controllers\Catalogos\CategoriasController::class, 'index']);
        Route::get('/categorias/lista_categorias', [App\Http\Controllers\Catalogos\CategoriasController::class, 'listar_categorias']);
        Route::get('/categorias/create', [App\Http\Controllers\Catalogos\CategoriasController::class, 'create']);
        Route::post('/categorias/store', [App\Http\Controllers\Catalogos\CategoriasController::class, 'store']);
        Route::get('/categorias/edit/{id}', [App\Http\Controllers\Catalogos\CategoriasController::class,'edit']);
        Route::post('/categorias/update/{id}',[App\Http\Controllers\Catalogos\CategoriasController::class, 'update']);
    });

});
