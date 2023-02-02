<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffdepartment extends Model
{
    use HasFactory;
    public $table ='staffdepartments';
    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
