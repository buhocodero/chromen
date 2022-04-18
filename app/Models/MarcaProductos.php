<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarcaProductos extends Model
{
    use HasFactory;
    protected $fillable = ['precio','cantidad','codigo_marca','codigo_producto'];
    //recibe
    public function productos()
    {
        return $this->belongsTo(Producto::class);//recibe de productos
    }    
    public function marcas()
    {
        return $this->belongsTo(Marca::class);//recibe de marcas
    }    

}
