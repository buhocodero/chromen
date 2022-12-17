<?php

namespace App\Http\Controllers\API;

use App\Models\SucursalEmpleados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SucursalEmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SucursalEmpleados::all();   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            "empleado_id" => ["required","string"],
            "sucursal_id" => ["required","string"]            
        ]);  
        $obj=SucursalEmpleados::create($validatedData);        
        return $obj;
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
     * @param  \App\Models\SucursalEmpleados  $sucursalEmpleados
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj=SucursalEmpleados::find($id);
        return $obj;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SucursalEmpleados  $sucursalEmpleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([
            "empleado_id" => ["required","string"],
            "sucursal_id" => ["required","string"]            
        ]);  
        $obj=SucursalEmpleados::find($id);
        $obj->update($request->all());
        return $obj;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SucursalEmpleados  $sucursalEmpleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SucursalEmpleados $sucursalEmpleados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SucursalEmpleados  $sucursalEmpleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return SucursalEmpleados::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
}
