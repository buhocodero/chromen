<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function tryCatch(
    $fun,
    string $message = 'Tenemos un problema con el servidor, intenta mas tarde'
  ) {
    try {
      return $fun();
    } catch (\Illuminate\Database\QueryException $e) {
      return $this->responseError([
        'message' => $message,
      ]);
    } catch (Exception $e) {
      $isArray = true;
      $data = json_decode($e->getMessage());

      if (!$data) {
        $isArray = false;
        $data = $e->getMessage();
      }

      return $this->responseError([
        'message' => $data,
        "array" => $isArray
      ]);
    }
  }

  public function responseError($data = array(), int $status = 422)
  {
    return response()->json([
      'success'  => false,
      'data'     => $data
    ], $status);
  }

  public function responseOk($data = array(), $message = 'Proceso realizado con exito!', int $status = 200)
  {
    return response()->json([
      'success'   => true,
      'data'      => $data,
      'message'         => $message
    ], $status);
  }

  public function empresa()
  {
    return $this->tryCatch(function () {
      $payload = auth()->payload();
      $empresa = $payload->get('empresa');
      if (!$empresa) {
        throw new Exception('La empresa no existe!');
      }
      return $empresa;
    });
  }
}
