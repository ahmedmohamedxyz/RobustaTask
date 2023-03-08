<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripReserveRequest;
use App\Http\Requests\ViewTripAvailableSeatRequest;
use App\Http\Services\TripService;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\TripReservations;

class TripController extends Controller
{
    public function reserve(TripReserveRequest $request, $tripId, TripService $tripService)
    {
        $trip = Trip::with(['reservations', 'stations'])->findOrFail($tripId);
        $seat = Seat::findOrFail($request->seat_id);
        if ($tripService->checkIfSeatEmptyOnTrip($trip, $request->from, $request->to, $seat)) {
            TripReservations::create([
                'trip_id' => $trip->id,
                'seat_id' => $seat->id,
                'from' => $request->from,
                'to' => $request->to,
            ]);

            return response()->json(['message' => __('seat is reserved successfully')], 201);
        } else {
            return response()->json(['message' => __('seat is not available')], 400);
        }
    }

    public function viewTripAvailableSeats(ViewTripAvailableSeatRequest $request, $tripId, TripService $tripService)
    {
        $trip = Trip::with(['reservations', 'stations', 'bus'])->findOrFail($tripId);
        $tripAvailableSeats = $tripService->calculateTripAvailableSeats($trip, collect($request->input()));

        return response()->json(['data' => $tripAvailableSeats]);
    }
}
