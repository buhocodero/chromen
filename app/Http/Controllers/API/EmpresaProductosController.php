<?php

namespace App\Http\Controllers\API;

use App\Models\EmpresaProductos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class EmpresaProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmpresaProductos::all();
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
            "producto_id" => ["required","string"]
        ]);  
        $empresaproductos=EmpresaProductos::create($validatedData);        
        return $empresaproductos;
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
     * @param  \App\Models\EmpresaProductos  $empresaProductos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresaproductos=EmpresaProductos::find($id);
        return $empresaproductos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresaProductos  $empresaProductos
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([
            "empresa_id" => ["required","string"],
            "producto_id" => ["required","string"]
        ]);  
        $empresaproductos=EmpresaProductos::find($id);
        $empresaproductos->update($request->all());
        return $empresaproductos;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpresaProductos  $empresaProductos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaProductos $empresaProductos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaProductos  $empresaProductos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return EmpresaProductos::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
}
