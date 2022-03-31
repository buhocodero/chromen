<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discounts;
use App\Models\Employee;

class EmployeeDiscounts extends Model
{
	use HasFactory;
    
    public function discounts(){
        return $this->belongsTo(Discounts::class,"id_discounts");
    }
    public function employees(){
        return $this->belongsTo(Employee::class,"id_employee");
    }
    
}
