<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre','descripcion'        
      ];
    public function personas()
    {
        return $this->belongsTo(Persona::class);
    }    
}
