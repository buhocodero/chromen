<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
  use HasFactory;
  public $timestamps = false;
  protected $fillable = ['nombre', 'estado'];

  protected $hidden = ['pivot'];

  public function users()
  {
    return $this->hasMany(User::class);
  }

  public function modulos()
  {
    return $this
      ->belongsToMany(Modulo::class, 'perfil_modulos', 'perfil_id', 'modulo_id')
      ->withPivot('id', 'add', 'update', 'delete', 'view');
  }
}
