<?php

namespace App\Http\Controllers\API;
use App\Models\Empresa;
use App\Models\EmpresaCliente;
use App\Models\EmpresaProductos;
use App\Models\Sucursal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empresa::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            "nombre" => ["required","string"],
            "ubicacion" => ["required","string"]
        ]);  
        $empresa=Empresa::create($validatedData);        
        if($empresa!==null && $empresa!=="" && $empresa!==[]){
            $sucursal = new Sucursal([
                "empresa_id" => $empresa->id,
                "nombre" => $empresa->nombre,
                "ubicacion" => $empresa->ubicacion,
                "casa_matriz" => "SI"
              ]);
            return $empresa->sucursales()->save($sucursal);
        }else{
            return "No se ha podido crear la sucursal";
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
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa=Empresa::find($id);
        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([
            "nombre" => ["required","string"],
            "ubicacion" => ["required","string"]
        ]);  
        $empresa=Empresa::find($id);
        $empresa->update($request->all());
        return $empresa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return Empresa::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
    
    public function empresa_clientes(Request $request){
        //En esta tabla se van a mostrar clientes potenciales 
        // o clientes regustrados por x empresa
        $validatedData = $request->validate([
            "empresa_id" => ["required","string"],
            "cliente_id" => ["required","string"]
        ]);  
        $empresaCliente=EmpresaCliente::create($validatedData);
        return $empresaCliente;
    }
    
}
