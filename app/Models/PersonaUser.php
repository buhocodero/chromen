<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaUser extends Model
{
  use HasFactory;
  protected $fillable = ['persona_id', 'user_id',"estado"];
  //recibe
  public function personas()
    {
        return $this->belongsTo(Persona::class);//recibe depersona
    }    
    public function usuarios()
    {
        return $this->belongsTo(User::class);//recibe de User
    }    
}
