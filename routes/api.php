<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PerfilController;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\TipoDocumentoController;
use App\Http\Controllers\API\DocumentoController;

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

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'auth',
], function () {
  Route::controller(DocumentoController::class)->group(function () {
    Route::post('/documento',  'create');
    //Route::get('/documento/{id}',  'show');
    //Route::put('/documento/{id}',  'edit');
    //Route::delete('/documento/{id}', 'destroy');    
    //Route::get('/documento','index');    
  });
});

Route::group([
  'middleware'  => 'jwt.verify',
  'prefix'      => 'auth',
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
  'prefix'      => 'auth',
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
