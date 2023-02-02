<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public function staffdepartments(){
        return $this->hasMany(Staffdepartment::class,'department_id','id');
    }
}
