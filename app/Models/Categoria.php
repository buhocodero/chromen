<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre','descripcion'
      ];
    public function video_categorias()
    {
        return $this->hasMany(Video_Categoria::class);
    }
}
