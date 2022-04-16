<?php

namespace App\Http\Controllers\API;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoDocumento::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return $request->all();
        return TipoDocumento::create($request->all());
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
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDocumento=TipoDocumento::find($id);        
        return $tipoDocumento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $tipoDocumento=TipoDocumento::find($id);
        $tipoDocumento->update($request->all());
        return $tipoDocumento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->show($id)!==null && $this->show($id)!==[]){
            return TipoDocumento::destroy($id);
        }else{
            return "El registro con id $id no existe";
        }        
    }
}
