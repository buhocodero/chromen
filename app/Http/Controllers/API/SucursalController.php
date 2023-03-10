<?php

namespace App\Http\Controllers\API;

use App\Models\Sucursal;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sucursal::all();   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            "empresa_id" => ["required","string"],
            "nombre" => ["required","string"],
            "ubicacion" => ["required","string"],
            "casa_matriz" => ["required","string"]            
        ]);  
        $sucursal=Sucursal::create($validatedData);        
        return $sucursal;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function sucursal(Request $request)
    {       
        $all = Empresa::where("id",$this->empresa())->with('sucursales')->get();
        return $this->responseOk($all);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sucursal=Sucursal::find($id);
        return $sucursal;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([
            "empresa_id" => ["required","string"],
            "nombre" => ["required","string"],
            "ubicacion" => ["required","string"],
            "casa_matriz" => ["required","string"]            
        ]);  
        $sucursal=Sucursal::find($id);
        $sucursal->update($request->all());
        return $sucursal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return Sucursal::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
}
