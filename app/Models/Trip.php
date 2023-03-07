<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function reservations()
    {
        return $this->hasMany(TripReservations::class);
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class);
    }
}
