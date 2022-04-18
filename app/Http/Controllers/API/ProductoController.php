<?php

namespace App\Http\Controllers\API;

use App\Models\Producto;
use App\Models\MarcaProductos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            "unidad_de_medida" => ["required","string"],
            "nombre" => ["required","string"],
            "foto" => ["required","string"],
            "caracteristicas" => ["required","string"]            
        ]);  
        $producto=Producto::create($validatedData);        
        return $producto;
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Producto::find($id);
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([
            "unidad_de_medida" => ["required","string"],
            "nombre" => ["required","string"],
            "foto" => ["required","string"],
            "caracteristicas" => ["required","string"]            
        ]);  
        $producto=Producto::find($id);
        $producto->update($request->all());
        return $producto;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        if($this->show($id)!==null && $this->show($id)!==[]){
            return Producto::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
    //


    public function productos_marca_readforId($id)
    {
        $producto=MarcaProductos::find($id);
        return $producto;
    }
    public function productos_marca(Request $request)
    {        
        //MarcaProductos
        $validatedData = $request->validate([
            "precio" => ["required","string"],
            "cantidad" => ["required","string"],
            "codigo_marca" => ["required","string"],
            "codigo_producto" => ["required","string"]            
        ]);  
        $marcaProductos=MarcaProductos::create($validatedData);        
        return $marcaProductos; 
    }
    public function productos_marca_read()
    {        
        //MarcaProductos
        $producto=MarcaProductos::all();
        return $producto;
    }
    public function productos_marca_update($id,Request $request)
    {        
        //MarcaProductos
        $validatedData = $request->validate([
            "precio" => ["required","string"],
            "cantidad" => ["required","string"],
            "codigo_marca" => ["required","string"],
            "codigo_producto" => ["required","string"]            
        ]);  
        $marca_producto=MarcaProductos::find($id);
        $marca_producto->update($request->all());
        return $marca_producto;
    }
    public function productos_marca_delete($id)
    {        
        if($this->productos_marca_readforId($id)!==null && $this->productos_marca_readforId($id)!==[]){
            return MarcaProductos::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
}
