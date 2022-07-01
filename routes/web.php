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
    return view('auth/login');
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
        Route::group(['middleware' => ['role:SuperAdmin']], function () {
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
        });
    });

    //RUTAS CATALOGOS
    Route::prefix('catalogos')->group(function (){
        //RUTAS AREAS      
        Route::get('/areas', [App\Http\Controllers\Catalogos\AreasController::class, 'index']);
        Route::get('/areas/lista_areas', [App\Http\Controllers\Catalogos\AreasController::class, 'listar_areas']);
        Route::get('/areas/create', [App\Http\Controllers\Catalogos\AreasController::class, 'create']);
        Route::post('/areas/store', [App\Http\Controllers\Catalogos\AreasController::class, 'store']);
        Route::get('/areas/edit/{id}', [App\Http\Controllers\Catalogos\AreasController::class,'edit']);
        Route::post('/areas/update/{id}',[App\Http\Controllers\Catalogos\AreasController::class, 'update']);
        //RUTAS CATEGORIAS        
        Route::get('/categorias', [App\Http\Controllers\Catalogos\CategoriasController::class, 'index']);
        Route::get('/categorias/lista_categorias', [App\Http\Controllers\Catalogos\CategoriasController::class, 'listar_categorias']);
        Route::get('/categorias/create', [App\Http\Controllers\Catalogos\CategoriasController::class, 'create']);
        Route::post('/categorias/store', [App\Http\Controllers\Catalogos\CategoriasController::class, 'store']);
        Route::get('/categorias/edit/{id}', [App\Http\Controllers\Catalogos\CategoriasController::class,'edit']);
        Route::post('/categorias/update/{id}',[App\Http\Controllers\Catalogos\CategoriasController::class, 'update']);
        //RUTAS PRODUCTOS
        Route::get('/productos', [App\Http\Controllers\Catalogos\ProductosController::class, 'index']);
        Route::get('/productos/listar_productos', [App\Http\Controllers\Catalogos\ProductosController::class, 'listar_productos']);
        Route::get('/productos/create', [\App\Http\Controllers\Catalogos\ProductosController::class, 'create']);
        Route::post('/productos/store', [App\Http\Controllers\Catalogos\ProductosController::class, 'store']);
        Route::get('/productos/edit/{id}', [App\Http\Controllers\Catalogos\ProductosController::class, 'edit']);
        Route::post('/productos/edit/update', [App\Http\Controllers\Catalogos\ProductosController::class,'update']);
        //RUTAS PROVEEDORES
        Route::get('/proveedores', [App\Http\Controllers\Catalogos\ProveedoresController::class, 'index']);
        Route::get('/proveedores/listar_proveedores', [App\Http\Controllers\Catalogos\ProveedoresController::class, 'listar_proveedores']);
        Route::get('/proveedores/create', [App\Http\Controllers\Catalogos\ProveedoresController::class, 'create']);
        Route::post('/proveedores/store', [App\Http\Controllers\Catalogos\ProveedoresController::class, 'store']);
        Route::get('/proveedores/edit/{id}', [App\Http\Controllers\Catalogos\ProveedoresController::class, 'edit']);
        Route::post('/proveedores/update/{id}', [App\Http\Controllers\Catalogos\ProveedoresController::class, 'update']);
    });

    Route::prefix('inventario')->group(function (){
        //RUTAS ENTRADAS
        Route::get('/entradas', [App\Http\Controllers\Inventario\EntradasController::class, 'index']);
        Route::get('/entradas/listar_entradas',[App\Http\Controllers\Inventario\EntradasController::class, 'listar_entradas']);
        Route::get('/entradas/create', [App\Http\Controllers\Inventario\EntradasController::class, 'create']);
        Route::post('/entradas/store', [App\Http\Controllers\Inventario\EntradasController::class, 'store']);
    });

});
