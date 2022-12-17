<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SucursalEmpleados extends Model
{
    use HasFactory;
    protected $fillable = ['empleado_id','sucursal_id'];
    //recibe
    public function sucursales()
    {
        return $this->belongsTo(Sucursal::class);//recibe de Sucursal
    }    
    public function empleados()
    {
        return $this->belongsTo(Empleado::class);//recibe de Empleado
    }    
}
