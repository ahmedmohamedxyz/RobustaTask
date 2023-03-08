<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripReservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id', 'seat_id', 'from', 'to', 'stations',
    ];

    protected $casts = [
        'stations' => 'array',
    ];
}
