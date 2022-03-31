<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeDiscounts;
class Discounts extends Model
{
    use HasFactory;
    public function employee_discounts(){
        return $this->hasMany(EmployeeDiscounts::class,"id");
    }
}
