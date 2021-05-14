<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    //public $table = 'employees';

    public function employeeSalaries()
    {
        return $this->hasMany(EmployeeSalary::class);
    }
}
