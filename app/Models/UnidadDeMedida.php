<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadDeMedida extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','simbolo','detalle'];
    //uno a muchos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
