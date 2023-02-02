<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomimages extends Model
{
    use HasFactory;
    protected $table = 'roomimages';
    protected $fillable = [
        'room_id',
        'image'
    ];
}
