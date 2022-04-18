<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['unidad_de_medida','caracteristicas','nombre','foto'];
    //uno a muchos
    public function marca_productos()
    {
        return $this->hasMany(MarcaProductos::class);
    }


    //recibe
    public function unidadesdemedida()
    {
        return $this->belongsTo(UnidadDeMedida::class);//recibe de UnidadDeMedida
    }    
}
