<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_perfil extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'perfil_id', 'estado'];
}
