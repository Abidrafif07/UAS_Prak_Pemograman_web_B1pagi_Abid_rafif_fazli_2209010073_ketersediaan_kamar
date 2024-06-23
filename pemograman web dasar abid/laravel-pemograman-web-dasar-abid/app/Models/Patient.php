<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $fillable = ['name', 'age', 'gender'];

    public function assignments()
    {
        return $this->hasMany(RoomAssignment::class);
    }

}
