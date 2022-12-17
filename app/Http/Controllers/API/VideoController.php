<?php

namespace App\Http\Controllers\API;

use App\Models\Video;
use App\Models\Categoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Video::all();   
    }
    public function max(){
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([            
            "nombre" => ["required","string"],
            "descripcion" => ["required","string"],
            "url" => ["required","string"],
            "urlImagen" => ["required","string"] ,
            "urlGif" => ["required","string"]  
        ]);                  
        $tmpVideo=$request->all();//recibe todo el post
        $tmpVideo['persona_id'] = '940';//agrega un nuevo atributo
        $video=Video::create($tmpVideo);        //crea el registro
        return $video;
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
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video=Video::find($id);
        return $video;
    }
/**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $video
     * @return \Illuminate\Http\Response
     */
    public function showCategorias()
    {
        return Categoria::all();
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    
    public function editImage($id,Request $request)
    {
        $validatedData = $request->validate([
            "urlImagen" => ["required","string"]            
        ]);  
        $video=Video::find($id);        
        $video->update($request->all());
        return $video;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return Video::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
}
