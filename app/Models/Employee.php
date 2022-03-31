<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sucursal;
use App\Models\EmployeeDiscounts;

class Employee extends Model
{
   use HasFactory;
    public function sucursals(){
        return $this->belongsTo(Sucursal::class,"id_sucursal");
    }    
    public function employee_discounts(){
        return $this->belongsTo(EmployeeDiscounts::class,"id_descuento");
    }    
}
