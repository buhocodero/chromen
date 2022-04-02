<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
  use HasFactory;
  public $timestamps = false;
  // protected $hidden = ['pivot'];

  protected $fillable = ['nombre', 'icon', 'short_name'];

  public function perfiles()
  {
    return $this->belongsToMany(Perfil::class, 'perfil_modulos', 'modulo_id', 'perfil_id');
  }
}
