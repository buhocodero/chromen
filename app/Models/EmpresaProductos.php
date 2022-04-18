<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaProductos extends Model
{
    use HasFactory;
    protected $fillable = ['empresa_id','producto_id'];
    public function empresas()
    {
        return $this->belongsTo(Empresa::class);//recibe de empresa
    }    
    public function productos()
    {
        return $this->belongsTo(Producto::class);//recibe de productos
    }    
}
