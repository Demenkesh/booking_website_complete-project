<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['roomtype_id','title','price','room_no'];
    function Roomtype(){
        return $this->belongsTo(RoomType::class,'roomtype_id','id');
    }
    public function roomImages(){
        return $this->hasMany(Roomimages::class,'room_id','id');
    }
}
