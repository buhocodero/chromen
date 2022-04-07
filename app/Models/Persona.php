<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  use HasFactory;
  protected $fillable = ['nombres', 'apellidos'];

  public function user()
  {
    return $this->belongsToMany(User::class, 'persona_users', 'user_id', 'persona_id');
  }
}
