<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilModulo extends Model
{
  use HasFactory;
  public $timestamps = false;
  protected $fillable = ['perfil_id', 'modulo_id', 'add', 'view', 'update', 'delete'];
}
