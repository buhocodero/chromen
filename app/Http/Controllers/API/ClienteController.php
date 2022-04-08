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
use App\Models\Persona;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return Persona::all();
    }
    //este metodo devuelve el cliente a partir del idPersona
    public function idClienteFromPerson($id)    {        
        $cliente=Cliente::where("persona_id","=",$id)->get();        
        return $cliente;
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
            "email" => "required|email|unique:personas,email",            
            "telefono" => ["string",new  ValidarTelefono],
            "celular" => ["required","string",new  ValidarCelular],            
            "direccion" => "required|string",
            
        ]);  
        $persona=Persona::create($request->all());                    
        if($persona!=="" && $persona!==null && $persona!=[]){
            $cliente = new Cliente([
                "persona_id" => $persona->id
              ]);
            return $persona->clientes()->save($cliente);
            
        }
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
    public function show($id)
    {
        $cliente=Cliente::find($id);
        return Persona::find($cliente->persona_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {       
        $validatedData = $request->validate([            
            "nombres" => ["required","string",new  ValidName],
            "apellidos" => ["required","string",new  ValidName],
            "email" => "required|email",            
            "telefono" => ["string",new  ValidarTelefono],
            "celular" => ["required","string",new  ValidarCelular],            
            "direccion" => "required|string",
            
        ]);  
        $cliente=Cliente::find($id);
        $persona=Persona::find($cliente->persona_id);        
        $persona->update($request->all());
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
    public function destroy($id)
    {
        return Cliente::destroy($id);
    }
}
