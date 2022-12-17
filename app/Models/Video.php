<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;    
    protected $fillable = [
        'nombre','descripcion','url',"urlImagen","urlGif","vistas","estado",'persona_id'       
      ];
      //uno a muchos
      //de video a video_categorias
    public function video_categorias()
    {
        return $this->hasMany(Video_Categoria::class);
    }
}
