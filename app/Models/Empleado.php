<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'persona_id'        
      ];
    public function personas()
    {
        return $this->belongsTo(Persona::class);
    }    
}
