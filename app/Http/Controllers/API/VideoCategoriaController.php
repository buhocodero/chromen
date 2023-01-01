<?php

namespace App\Http\Controllers\API;

use App\Models\Video_Categoria;
use App\Models\Categoria;
use App\Models\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VideoCategoriaController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        return Video_Categoria::join("categorias","video__categorias.categoria_id","=","categorias.id")
        ->select("video__categorias.categoria_id",
        "video__categorias.video_id",
        "categorias.nombre",
        "categorias.id")
        //->where("video__categorias.categoria_id", "=", "11")
        ->get();        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([            
            "video_id" => ["required","string"],
            "categoria_id" => ["required","string"]            
        ]);                  
        $tmpRequest=$request->all();//recibe todo el post                
        $vid_cat=Video_Categoria::create($tmpRequest);        //crea el registro
        return $vid_cat;
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
     * @param  \App\Models\Video_Categoria  $video_Categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        return Video_Categoria::join("categorias","video__categorias.categoria_id","=","categorias.id")
        ->select("video__categorias.categoria_id",
        "video__categorias.video_id",
        "categorias.nombre",
        "categorias.id")
        ->where("video__categorias.video_id", "=", $id)
        ->get();        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video_Categoria  $video_Categoria
     * @return \Illuminate\Http\Response
     */
    public function showforCategory(Request $request)
    {   
        return Video_Categoria::join("categorias","video__categorias.categoria_id","=","categorias.id")
        ->join("videos","video__categorias.video_id","=","videos.id")        
        ->select("videos.*")
        ->where("categorias.nombre", "=", $request->categoria)
        ->take(10)->get();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video_Categoria  $video_Categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Video_Categoria $video_Categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video_Categoria  $video_Categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video_Categoria $video_Categoria)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id,Request $request)
    {
        //hacer que elimine cuando ambas condiciones coinciden en vid_cat        
                               
     $vid_cat= Video_Categoria::where([
            ["video__categorias.video_id", "=", $id],
            ["video__categorias.categoria_id", "=", $request->categoria_id],
        ])->firstOrFail();
     return $vid_cat->delete();
    }
    
}
