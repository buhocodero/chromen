<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\ValidName;

use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            "nombres" => ["required","string",new  validName],
            "apellidos" => "required|string",
            "email" => "required|string|unique:clientes,email",            
            "telefono" => "required|string",
            "documento" => "required|string",
            "tipo_documento" => "required|string",
            "fecha_nacimiento" => "required|string",
            "direccion" => "required|string",            
            "NIT" => "required"           ,
        ]);        
        return Cliente::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Cliente::find($request["id"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            "id"=>"required|string",
            "nombres" => ["required","string",new  validName],
            "apellidos" => "required|string",
            "email" => "required|string|unique:clientes,email",            
            "telefono" => "required|string",
            "documento" => "required|string",
            "tipo_documento" => "required|string",
            "fecha_nacimiento" => "required|string",
            "direccion" => "required|string",            
            "NIT" => "required"           ,
        ]);        
        $cliente= Cliente::find($request["id"]);
        $cliente->update($request->all());
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return Cliente::destroy($request["id"]);
    }
}
