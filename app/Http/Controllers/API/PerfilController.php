<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\PerfilModulo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
  // Para los perfiles
  public function all()
  {
    $all = Perfil::all();
    return $this->responseOk($all);
  }

  public function perfil($id)
  {
    $perfil = Perfil::where('id', $id)->with('modulos')->first();
    return $this->responseOk($perfil);
  }

  public function add(Request $request)
  {
    $validated = Validator::make($request->all(), [
      'nombre' => 'required|min:3'
    ]);
    return $this->tryCatch(function () use ($validated) {
      if ($validated->fails()) {
        throw new Exception($validated->errors());
      }

      $inputs = $validated->validated();
      $perfil = Perfil::create([
        "nombre" => $inputs['nombre']
      ]);
      return $this->responseOk($perfil, "El perfil {$inputs['nombre']}, ha sido registrado con exito!");
    });
  }

  public function update($id, Request $request)
  {
    $validated = Validator::make($request->all(), [
      'nombre' => 'required|min:3'
    ]);
    return $this->tryCatch(function () use ($validated, $id) {
      if ($validated->fails()) {
        throw new Exception($validated->errors());
      }

      $inputs = $validated->validated();
      $perfil = Perfil::find($id);
      if (!$perfil) {
        throw new Exception("El perfil no existe");
      }
      $perfil->update([
        'nombre'  => $inputs['nombre']
      ]);
      return $this->responseOk($perfil, 'El perfil ha sido modificado con exito');
    });
  }

  //TODO: Nose podra eliminar al pefil siempre que tenga modulos asignados
  public function delete($id)
  {
    return $this->tryCatch(function () use ($id) {
      $perfil = Perfil::find($id);
      if (!$perfil) {
        throw new Exception("El perfil no existe");
      }
      $perfil->delete();
      return $this->responseOk($perfil, "El perfil {$perfil->nombre}, ha sido eliminado con exito!");
    });
  }

  public function status($id)
  {
    return $this->tryCatch(function () use ($id) {
      $perfil = Perfil::find($id);
      if (!$perfil) {
        throw new Exception('El perfil no existe');
      }
      $perfil->update([
        'estado' => $perfil->estado === 'A' ? 'I' : 'A'
      ]);
      return $this->responseOk($perfil, 'El estado del perfil {$perfil->estado}, ha sido modificado');
    });
  }

  // Para los modulos
  public function deleteModulo($id, $modulo)
  {
    $data = PerfilModulo::find($modulo);
    if (!$data || strcmp($data->perfil_id, $id) != 0) {
      return $this->responseError([
        'message' => 'El modulo no existe en el perfil'
      ], 404);
    }

    return $this->tryCatch(function () use ($data) {
      $data->delete();
      return $this->responseOk([
        'message' => 'El modulo ha sido eliminado con exito',
        'data'    => $data
      ]);
    });
  }

  public function addModulo($id, Request $request)
  {
    $validated = Validator::make($request->all(), [
      'modulo'    => 'required',
      'add'       => Rule::in('A', 'I'),
      'update'    => Rule::in('A', 'I'),
      'delete'    => Rule::in('A', 'I'),
    ]);

    if ($validated->fails()) {
      return $this->responseError($validated->errors());
    }

    $perfil = Perfil::find($id);
    if (!$perfil) {
      return $this->responeError([
        'message' => 'Not Found'
      ], 404);
    }

    $inputs = $validated->validated();
    //TODO: Verificar que el modulo no este agregado
    try {
      $perfil->modulos()->attach($inputs['modulo'], [
        'add'     => isset($inputs['add']) ? $inputs['add'] : 'I',
        'update'  => isset($inputs['update']) ? $inputs['update'] : 'I',
        'delete'  => isset($inputs['delete']) ? $inputs['delete'] : 'I'
      ]);
      return $this->responseOk([
        'message' => 'Proceso realizado con exito',
        "modulos" => $perfil->modulos
      ]);
    } catch (\Illuminate\Database\QueryException $e) {
      return $this->responseError([
        'message' => 'Tenemos un problema el modulo no es valido'
      ]);
    }
  }
}
