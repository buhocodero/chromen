<?php

namespace App\Http\Controllers\API;

use App\Models\UnidadDeMedida;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UnidadDeMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UnidadDeMedida::all();   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //        
        $validatedData = $request->validate([
            "nombre" => ["required","string"],
            "simbolo" => ["required","string"],
            "detalle" => ["required","string"]
        ]);  
        $unidaddemedida=UnidadDeMedida::create($validatedData);        
        return $unidaddemedida;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnidadDeMedida  $unidadDeMedida
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidaddemedida=UnidadDeMedida::find($id);
        return $unidaddemedida;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadDeMedida  $unidadDeMedida
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([
            "nombre" => ["required","string"],
            "simbolo" => ["required","string"],
            "detalle" => ["required","string"]
        ]);  
        $unidaddemedida=UnidadDeMedida::find($id);
        $unidaddemedida->update($request->all());
        return $unidaddemedida;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnidadDeMedida  $unidadDeMedida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadDeMedida $unidadDeMedida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadDeMedida  $unidadDeMedida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return UnidadDeMedida::destroy($id);
        }else{
            return "El registro con id $id no existe";
        } 
    }
}
