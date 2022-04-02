<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  use HasFactory;
  protected $fillable = [
    'categoria_id', 'codigo', 'descripcion', 'imagen', 'precio_venta', 'precio_compra'
  ];
}
