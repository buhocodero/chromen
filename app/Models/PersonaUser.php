<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaUser extends Model
{
  use HasFactory;
  protected $fillable = ['persona_id', 'user_id'];
}