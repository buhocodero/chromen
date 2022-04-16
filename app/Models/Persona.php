<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  use HasFactory;
  protected $fillable = [
    'nombres', 'apellidos', 'email', 'telefono',      
    'celular','direccion', 'fecha_nacimiento'
  ];
  public function clientes()
  {
    return $this->hasMany(Cliente::class);
  }
  public function empleados()
  {
    return $this->hasMany(Empleado::class);
  }
  public function documentos()
  {
    return $this->hasMany(Documento::class);
  }
  public function user()
  {
    
    return $this->belongsToMany(User::class, 'persona_users', 'user_id', 'persona_id');
  }
}
