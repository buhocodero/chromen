<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Str;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
  //TODO:Verificar que el usuario este activo, asi como el perfil
  public function register(Request $request){
    $fields = Validator::make($request->all(), [
      "usuario"  => 'required|string|min:6',
      "password"  => 'required|string|confirmed'
    ]);
    //    
    $user = User::create([
        'usuario' => $request['usuario'],
        'ultimo_login' => "2022-04-07 19:49:46",
        'perfil_id' => "3",
        'avatar' => "https://via.placeholder.com/640x480.png/001199?text=fugiat",
        'password' => bcrypt($request['password']),
        'remember_token'  => Str::random(10)      
      ]);
    //$userData=User::create($user);
    //$token=$user->createToken('myapptoken')->plainTextToken;    
    // $response=[
    //     "user" => $user
    //     //"token" => $token
    // ];
    return $user; 
  }
  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "usuario"  => 'required|min:6',
      "password"  => 'required|string|min:8'      
    ]);
    // if ($validator->fails()) {
    //   return $this->responseError($validator->errors(), 'Validated errors');
    // }
    $token = auth()->attempt($validator->validated());
    if (!$token) {
      return $this->responseError([
        'error' => 'Credenciales incorrectas'
      ], 401);
    }
    //$token=$user->createToken('myapptoken')->plainTextToken;
    return $this->createNewToken($token);
    //return ($token);
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
    return $this->responseOk(
      $this->userAndRoles(),
    );
  }

  // funciones utiles para la creacion de tokens
  protected function createNewToken($token)
  {
    return $this->responseOk([
      "token" => $token,
      //"data"  => self::userAndRoles(),
    ]);
  }

  private function userAndRoles()
  {
    $user = auth()->user();
    $persona = User::find($user->id)->with('persona')->first();
    $perfil = Perfil::where('id', $user->perfil_id)->with('modulos')->get();

    $data = self::getDataUser($persona);

    return [
      "perfil"  => $perfil,
      "data"   => $data,
    ];
  }

  private function getDataUser($user)
  {
    $persona = $user->persona[0];
    return [
      'nombres'     => $persona->nombres,
      'apellidos'   => $persona->apellidos,
      'usuario'     => $user->usuario,
      'avatar'      => $user->avatar
    ];
  }
}
