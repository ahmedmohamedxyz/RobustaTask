<?php

namespace App\Http\Services;

use App\Models\Seat;
use App\Models\Trip;
use App\Models\TripReservations;
use Illuminate\Support\Collection;

class TripService
{
    public function calculateTripAvailableSeats(Trip $trip, Collection $filters)
    {
        $allTripPathes = $this->tripAvailablePaths($trip);
        $reservationPathes = [];
        $availableSeats = [];

        $seats = $trip->bus->seats;
        $reservations = $trip->reservations;

        foreach ($reservations as $reservation) {
            $tripPathes = $allTripPathes;
            $reservationPathes = $this->getPathsBetweenStations($trip, $reservation->from, $reservation->to);

            foreach ($tripPathes as $tripPathKey => $tripPath) {
                foreach ($reservationPathes as $reservationPath) {
                    if (strpos($tripPath, $reservationPath) !== false) {
                        unset($tripPathes[$tripPathKey]);
                    }
                }
            }
            // $requestedPath=$this->getRequestedPath($trip,$filters->get('from'),$filters->get('to'));
            // foreach($tripPathes as $tripPath){
            //     if(strpos($tripPath,$requestedPath) !== false){
            //         $availableSeats[]= $reservation->seat_id;
            //     }
            // }
        }

        foreach ($seats as $seat) {
            $reservation = $reservations->search(function ($reservation) use ($seat) {
                return $reservation->seat_id === $seat->id;
            });
            // if seat not recorded in the reservations then it is available despite the stations
            if ($reservation === false) {
                $availableSeats[] = $seat->id;
            }
        }

        return $availableSeats;
    }

    private function tripAvailablePaths(Trip $trip): array
    {
        $stations = $trip->stations->pluck('id')->toArray();

        $paths = [[]];

        foreach ($stations as $station) {
            foreach ($paths as $combination) {
                $comResult = array_merge([$station], $combination);
                array_push($paths, $comResult);
            }
        }

        foreach ($paths as $key => $path) {
            if (count($path) <= 1) {
                unset($paths[$key]);
            } else {
                $paths[$key] = strrev(implode('', $paths[$key]));
            }
        }

        return $paths;
    }

    private function getPathsBetweenStations(Trip $trip, int $from, int $to): array
    {
        $stations = $trip->stations->pluck('id')->toArray();
        $firstStationIndex = array_search($from, $stations);
        $lastStationIndex = array_search($to, $stations);
        $sationsRange = [];

        foreach ($stations as $key => $station) {
            if ($key >= $firstStationIndex && $key <= $lastStationIndex) {
                $sationsRange[] = $station;
            }
        }

        $paths = [[]];
        foreach ($sationsRange as $station) {
            foreach ($paths as $combination) {
                $comResult = array_merge([$station], $combination);
                array_push($paths, $comResult);
            }
        }

        foreach ($paths as $key => $path) {
            if (count($path) <= 1) {
                unset($paths[$key]);
            } else {
                $paths[$key] = strrev(implode('', $paths[$key]));
            }
        }

        return $paths;
    }

    public function checkIfSeatEmptyOnTrip(Trip $trip, int $from, int $to, Seat $seat)
    {
        $tripReservation = TripReservations::where('trip_id', $trip->id)->where('seat_id', $seat->id)->first();
        if (! $tripReservation) {
            return true;
        } elseif ($tripReservation->from === $from && $tripReservation->to === $to) {
            return false;
        } else {
            // TODO handle the case the $from & $to is inbetween stations
        }
    }

    private function getRequestedPath(Trip $trip, int $from, int $to): string
    {
        $stations = $trip->stations->pluck('id')->toArray();
        $firstStationIndex = array_search($from, $stations);
        $lastStationIndex = array_search($to, $stations);
        $sationsRange = [];

        foreach ($stations as $key => $station) {
            if ($key >= $firstStationIndex && $key <= $lastStationIndex) {
                $sationsRange[] = $station;
            }
        }

        return implode('', $sationsRange);
    }
}
