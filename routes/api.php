<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PerfilController;

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
