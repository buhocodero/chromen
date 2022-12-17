<?php

namespace App\Http\Controllers\API;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categoria::all();
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
            "descripcion" => ["required","string"]            
        ]);                  
        $tmpCategoria=$request->all();//recibe todo el post        
        
        $categoria=Categoria::create($tmpCategoria);        //crea el registro
        return $categoria;
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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria=Categoria::find($id);
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $validatedData = $request->validate([            
            "nombre" => ["required","string"],
            "descripcion" => ["required","string"]            
        ]);            
        $cat=Categoria::find($id);
        $cat->update($request->all());
        return $cat;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return Categoria::destroy($id);
        }else{
            return "El registro no existe";
        }        
    }
}
