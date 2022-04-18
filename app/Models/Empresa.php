<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  use HasFactory;
  protected $fillable = ['nombre','ubicacion'];

  public function perfiles()
  {
    return $this->hasMany(Perfil::class);
  }
  public function empresa_productos()
  {
    return $this->hasMany(EmpresaProductos::class);
  }
  public function sucursales()
  {
    return $this->hasMany(Sucursal::class);
  }
  public function empresa_clientes()
  {
    return $this->hasMany(EmpresaCliente::class);
  }
}
