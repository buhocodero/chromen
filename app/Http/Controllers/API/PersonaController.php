<?php

namespace App\Http\Controllers\API;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    
    public function index()
    {
        /* $validatedData = $request->validate([
            "id"=>"required|string",
            "nombres" => ["required","string",new  ValidName],
            "apellidos" => ["required","string",new  ValidName],
            "email" => "required|email",            
            "telefono" => ["string",new  ValidarTelefono],
            "celular" => ["required","string",new  ValidarCelular],            
            "direccion" => "required|string",
            
        ]);             */
        //$cliente= Cliente::find($request["id"]);
        $persona=Persona::create($request->all());
        return $persona;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $persona=Persona::create($request);        
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
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
