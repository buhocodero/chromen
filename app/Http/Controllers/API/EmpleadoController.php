<?php

namespace App\Http\Controllers\API;

use App\Models\Documento;
use App\Models\Empleado;
use App\Models\Persona;
use App\Models\SucursalEmpleados;
use App\Models\Sucursal;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\ValidName;
use App\Rules\ValidarTelefono;
use App\Rules\ValidarCelular;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$empleado=Sucursal::where("empresa_id","=",$this->empresa())->get();        
        //$empleado=Sucursal::where("empresa_id","=",$this->empresa())->with('sucursal_empleados')->get();        
        $empleado=Sucursal::where("empresa_id","=",$this->empresa())->with('sucursal_empleados')->get();        
        return $empleado;
        

        // $empresa = $this->empresa();
        // $all = Empresa::find($empresa)->with('perfiles')->get();
        // sucursal_empleados
        //return $empleado;
        //return Empleado::all();
    }

    //este metodo devuelve el empleado a partir del idPersona
    public function idClienteFromPerson($id)    {        
        $empleado=Empleado::where("persona_id","=",$id)->get();        
        return $empleado;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function generateCod($name,$codigoPersona){        
            // $token = strtok($name, " \t"); // Primer token
            // $i=0;
            // $codigo="";
            // while($token!==false) {
            //     // En los tokens subsecuentes no se include el string $cadena
            //     $codigo.=strtoupper($token[0]);
            //     $token = strtok(" \t");$i++;
            // }
            // if (strlen($codigo)>6) {
            //     $codigo=strtoupper(substr($codigo,0,6));
            // }
            // $codigo.=$codigoPersona; 

    }
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
            $empleado = new Empleado([
                "persona_id" => $persona->id // ,
                //"codigoPersona" =>$codigoPersona
              ]);
            $empleado=$persona->empleados()->save($empleado);               
            // $completo=$persona->nombres." ".$persona->apellidos        ;
                       

            $documento=Documento::create([
                "id_persona" => $persona->id,
                "id_tipo_documento" => 1,
                "numeroDocumento" => $request->numeroDocumento
                // "foto" => $codigo
              ]);
            $sucursal= SucursalEmpleados::create([
                "empleado_id" => $empleado->id,
                "sucursal_id" => $request->sucursal
            ]);
            return $persona;           
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
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado=Empleado::find($id);
        return Persona::find($empleado->persona_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
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
        $empleado=Empleado::find($id);
        $persona=Persona::find($empleado->persona_id);        
        $persona->update($request->all());
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return Empleado::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
}
