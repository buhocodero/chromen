<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Perfil;
use App\Models\User;

class AuthController extends Controller
{
  //TODO:Verificar que el usuario este activo, asi como el perfil
  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "usuario"  => 'required|min:6',
      "password"  => 'required|string|min:8'
    ]);

    if ($validator->fails()) {
      return $this->responseError($validator->errors(), 'Validated errors');
    }

    $token = auth()->attempt($validator->validated());
    if (!$token) {
      return $this->responseError([
        'error' => 'Credenciales incorrectas'
      ], 401);
    }

    return $this->createNewToken($token);
  }

  public function logout()
  {
    auth()->logout();
    return $this->responseOk([
      'message' => 'Usuario ha sido deslogeado con exito'
    ]);
  }

  public function me()
  {
    return $this->responseOk(self::userAndRoles());
  }

  // funciones utiles para la creacion de tokens
  protected function createNewToken($token)
  {
    return $this->responseOk([
      "token" => $token,
      "data"  => self::userAndRoles(),
    ]);
  }

  private function userAndRoles()
  {
    $user = auth()->user();
    $usuario = User::where('id', $user->id)->select('nombres', 'apellidos', 'usuario', 'avatar')->first();
    $perfil = Perfil::where('id', $user->perfil_id)->with('modulos')->get();

    return [
      "perfil"  => $perfil,
      "usuario" => $usuario,
    ];
  }
}
