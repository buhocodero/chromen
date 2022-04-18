<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PerfilController;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\TipoDocumentoController;
use App\Http\Controllers\API\DocumentoController;
use App\Http\Controllers\API\EmpleadoController;
use App\Http\Controllers\API\EmpresaController;
use App\Http\Controllers\API\SucursalController;
use App\Http\Controllers\API\MarcaController;
use App\Http\Controllers\API\UnidadDeMedidaController;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\EmpresaProductosController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'empresas',
], function () {
  Route::controller(EmpresaProductosController::class)->group(function () {
    Route::post('/productos',  'create');
    Route::get('/productos/{id}',  'show');
    Route::put('/productos/{id}',  'edit');
    Route::delete('/productos/{id}', 'destroy');    
    Route::get('/productos','index');        
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'producto',
], function () {
  Route::controller(ProductoController::class)->group(function () {
    Route::post('/productos',  'create');
    Route::get('/productos/{id}',  'show');
    Route::put('/productos/{id}',  'edit');
    Route::delete('/productos/{id}', 'destroy');    
    Route::get('/productos','index');    
    //crud productosmarcas
    Route::post('/marcas','productos_marca');    //create    
    Route::get('/marcas/','productos_marca_read');    //
    Route::get('/marcas/{id}','productos_marca_readforId');    //
    Route::put('/marcas/{id}','productos_marca_update');    //
    Route::delete('/marcas/{id}','productos_marca_delete');    //    
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'medidas',
], function () {
  Route::controller(UnidadDeMedidaController::class)->group(function () {
    Route::post('/unidades',  'create');
    Route::get('/unidades/{id}',  'show');
    Route::put('/unidades/{id}',  'edit');
    Route::delete('/unidades/{id}', 'destroy');    
    Route::get('/unidades','index');    
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'marca',
], function () {
  Route::controller(MarcaController::class)->group(function () {
    Route::post('/marcas',  'create');
    Route::get('/marcas/{id}',  'show');
    Route::put('/marcas/{id}',  'edit');
    Route::delete('/marcas/{id}', 'destroy');    
    Route::get('/marcas','index');    
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'sucursal',
], function () {
  Route::controller(SucursalController::class)->group(function () {
    Route::post('/sucursales',  'create');
    Route::get('/sucursales/{id}',  'show');
    Route::put('/sucursales/{id}',  'edit');
    Route::delete('/sucursales/{id}', 'destroy');    
    Route::get('/sucursales','index');    
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'empresa',
], function () {
  Route::controller(EmpresaController::class)->group(function () {
    Route::post('/clientes',  'empresa_clientes');//se crea el cliente a una empresa x
    Route::post('/productos',  'empresa_productos');//se crea productos a una empresa x    
    Route::post('/empresas',  'create');
    Route::get('/empresas/{id}',  'show');
    Route::put('/empresas/{id}',  'edit');
    Route::delete('/empresas/{id}', 'destroy');    
    Route::get('/empresas','index');    
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'empleado',
], function () {
  Route::controller(EmpleadoController::class)->group(function () {
    Route::post('/empleados',  'create');
    Route::get('/empleados/{id}',  'show');
    Route::put('/empleados/{id}',  'edit');
    Route::delete('/empleados/{id}', 'destroy');    
    Route::get('/empleados','index');    
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'doc',
], function () {
  Route::controller(DocumentoController::class)->group(function () {
    Route::post('/documento',  'create');
    Route::get('/documento/{id}',  'show');
    Route::put('/documento/{id}',  'edit');
    Route::delete('/documento/{id}', 'destroy');    
    Route::get('/documentos','index');    
  });
});
//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY1MDA0Njg2MCwiZXhwIjoxNjUwMDUwNDYwLCJuYmYiOjE2NTAwNDY4NjAsImp0aSI6Im5jMFNHVjEya2k0YTF5bXQiLCJzdWIiOjIxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwiZW1wcmVzYSI6NzE2fQ.vFZeBR_OzOjgqVKOcRH6HyQZAFHgNw1MAA5BH-qUeBk
Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => '/tDoc',
], function () {
  Route::controller(TipoDocumentoController::class)->group(function () {
    Route::post('/tipodocumento',  'create');
    Route::get('/tipodocumento/{id}',  'show');
    Route::put('/tipodocumento/{id}',  'edit');
    Route::delete('/tipodocumento/{id}', 'destroy');    
    Route::get('/tipodocumento','index');    
  });
});


Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'cliente',
], function () {
  Route::controller(ClienteController::class)->group(function () {
    Route::post('/clientes',  'create');
    Route::get('/clientes/{id}',  'show');
    Route::put('/clientes/{id}',  'edit');
    Route::delete('/clientes/{id}', 'destroy');    
    Route::get('/clientes','index');    
    Route::get('/clienteId/{id}', 'idClienteFromPerson');        
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'auth',
], function () {
  Route::controller(AuthController::class)->group(function () {
    Route::post('/logout', 'logout');
    Route::post('/me', 'me');
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'perfiles'
], function () {
  Route::controller(PerfilController::class)->group(function () {
    // Para los perfiles
    Route::get('/', 'all');
    Route::get('/{id}', 'perfil');
    Route::post('/', 'add');
    Route::put('/{id}', 'update');
    Route::put('/{id}/status', 'status');
    Route::delete('/{id}', 'delete');

    // Para los modulos
    Route::post('/{id}/modulo', 'addModulo');
    Route::delete('/{id}/modulo/{modulo}', 'deleteModulo');
  });
});
