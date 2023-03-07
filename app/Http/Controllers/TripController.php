<?php

namespace App\Http\Controllers;

use App\Http\Requests\ViewTripRequest;
use App\Models\Trip;

class TripController extends Controller
{
    public function view(ViewTripRequest $request,$tripId)
    {
        $trip = Trip::with(['reservations','stations'])->findOrFail($tripId);
    }

    public function viewTripAvailableSeats(ViewTripRequest $request,$tripId)
    {
        $trip = Trip::with('reservations')->findOrFail($tripId);
        
    }


}
