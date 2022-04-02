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
    Route::get('/', 'all');
    Route::post('/{id}/add', 'addPerfilModulo');
    
    Route::get('/{id}', 'perfil');
  });
});
