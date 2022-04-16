<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'usuario', 'avatar', 'password','ultimo_login','remember_token','perfil_id'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'ultimo_login' => 'datetime',
  ];

  public function perfil()
  {
    return $this->belongsTo(Perfil::class);
  }

  public function persona()
  {
    return $this->belongsToMany(Persona::class, 'persona_users', 'user_id', 'persona_id');
  }

  public function getJWTIdentifier()
  {
    return $this->getKey();
  }
  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
    return [
      'empresa' => $this->perfil->empresa_id
    ];
  }
  
}
