<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
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

  public function addPerfilModulo($id, Request $request)
  {
    $validated = Validator::make($request->all(), [
      'modulo'    => 'required',
      'add'       => Rule::in('A', 'I'),
      'update'    => Rule::in('A', 'I'),
      'delete'    => Rule::in('A', 'I'),
    ]);

    if ($validated->fails()) {
      return $this->responeError($validated->errors());
    }

    $perfil = Perfil::find($id);
    if (!$perfil) {
      return $this->responeError([
        'message' => 'Not Found'
      ], '', 404);
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
        'message' => 'Proceso realizado con exito'
      ]);
    } catch (\Illuminate\Database\QueryException $e) {
      return $this->responeError([
        'message' => 'Tenemos un problema el modulo no es valido'
      ]);
    }
  }
}
