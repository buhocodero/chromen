<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Sucursal extends Model
{
 
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
    ];
    
    public function employees(){
        return $this->hasMany(Employee::class,"id");
    }
}
