<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{ 
    protected $fillable = ['room_number', 'level', 'status'];

    public function assignments()
    {
        return $this->hasMany(RoomAssignment::class);
    }

}
