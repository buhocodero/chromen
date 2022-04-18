<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $fillable = ['empresa_id','nombre','ubicacion','casa_matriz'];
    //uno a muchos 
    //una sucursal
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    public function sucursal_empleados()
    {
        return $this->hasMany(SucursalEmpleados::class);
    }
    //recibe
    public function empresas()
    {
        return $this->belongsTo(Empresa::class);//recibe de empresa
    }    
    
}
