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
Route::post('/auth/register', [AuthController::class, 'register']);


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
  'prefix'      => 'clientes',
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
