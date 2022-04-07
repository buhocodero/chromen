<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\ValidName;
use App\Rules\ValidarTelefono;
use App\Rules\ValidarCelular;

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
        $validatedData = $request->validate([
            "nombres" => ["required","string",new  ValidName],
            "apellidos" => ["required","string",new  ValidName],
            "email" => "required|email|unique:clientes,email",            
            "telefono" => ["string",new  ValidarTelefono],
            "celular" => ["required","string",new  ValidarCelular],            
            "direccion" => "required|string",
            
        ]);        
        return Cliente::create($validatedData);
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
            "nombres" => ["required","string",new  ValidName],
            "apellidos" => ["required","string",new  ValidName],
            "email" => "required|email",            
            "telefono" => ["string",new  ValidarTelefono],
            "celular" => ["required","string",new  ValidarCelular],            
            "direccion" => "required|string",
            
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
