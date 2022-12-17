<?php

namespace App\Http\Controllers\API;
use App\Models\Empresa;
use App\Models\EmpresaCliente;
use App\Models\EmpresaProductos;
use App\Models\Sucursal;
use App\Models\Persona;
use App\Models\Perfil;
use App\Models\Documento;
use App\Models\User;
use App\Models\PersonaUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
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
    
    
    public function createWithPerson(Request $request)
    {
        $validatedData = $request->validate([
            "nombre" => ["required","string"],
            "ubicacion" => ["required","string"],
            "verificacion" => ["required","string"]
        ]);  
        $empresa=Empresa::create($validatedData);                       
        if($empresa!==null && $empresa!=="" && $empresa!==[]){
            $sucursal = new Sucursal([
                "empresa_id" => $empresa->id,
                "nombre" => $empresa->nombre,
                "ubicacion" => $empresa->ubicacion,
                "casa_matriz" => "SI"
              ]);
            $empresa->sucursales()->save($sucursal);            
            //Perfil
            //se creara los perfiles de Empresa
            if($empresa->id!=null && $empresa->id!=""){
                $perfil=Perfil::create([
                    "empresa_id" => $empresa->id,
                    "nombre" => "Administrador",
                    "estado" => "A"
                ]);
                if($perfil->id!=null && $perfil->id!=""){
                    $persona=Persona::create([
                        "apellidos" => $request["apellidos"],
                        "nombres" => $request["nombres"],
                        "email" => $request["email"],
                        "telefono" => $request["telefono"],
                        "celular" => $request["celular"],
                        "direccion" => $request["direccion"],
                        "fecha_nacimiento" => $request["fecha_nacimiento"],
                        "tipoPersona" => "administradorEmpresa"
                    ]);
                    if($persona->id!=null && $persona->id!=""){
                        //documento
                        $documento= Documento::create([
                            "id_tipo_documento"=>"1",
                            "id_persona"=>$persona->id,
                            "numeroDocumento"=>$request["documento"]
                        ]);
                        if($documento->id!=null && $documento->id!=""){
                            //se crea el usuario
                            $user=User::create([
                                "usuario"=>$request["email"],                
                                'ultimo_login' => "2022-04-07 19:49:46",
                                'perfil_id' => $perfil->id,
                                'avatar' => "https://via.placeholder.com/640x480.png/001199?text=fugiat",
                                'password' => bcrypt($request['password']),
                                'remember_token'  => Str::random(10)                
                            ]);      
                            //$documento->delete();        
                            //probar si elimina datos solo con el objeto
                            if($user->id!=null && $user->id!=""){
                                //relacion persona-user
                                $personaUser=PersonaUser::create([
                                    "persona_id"=> $persona->id,
                                    "user_id"=> $user->id,
                                    "estado"=> "A"
                                ]);
                                
                                if($personaUser->id!=null && $personaUser->id!=""){
                                    return $personaUser;
                                }else{
                                    return "Fallo interno al registrar datos de usuario y datos personal";                                        
                                    // $personaUser->delete(); 
                                    // $documento->delete();        
                                    // $persona->delete();        
                                    // $perfil->delete();        
                                }
                            }else{
                                return "Fallo al registrar el usuario personal";    
                                // $user->delete();        
                                // $documento->delete();        
                                // $persona->delete();        
                                // $perfil->delete();        
                            }

                        }else{
                            return "Fallo interno al registrar el dui";
                            // $documento->delete();        
                            // $persona->delete();        
                            // $perfil->delete();        
                        }
                    }else{
                        return "Fallo registro datos personales";    
                        // $persona->delete();        
                        // $perfil->delete();        
                    }
                }else{
                    return "Fallo interno al registrar la información";                    
                    // $perfil->delete();        
                }
            }else{
                return "fallo la creacion de la empresa";
            }                        
        }else{
            return "No se ha podido crear la sucursal";
        }        
    }
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
