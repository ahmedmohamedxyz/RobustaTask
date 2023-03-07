<?php

use App\Http\Controllers\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('trip')->group(function(){
    Route::get('{trip_id}',[TripController::class,'view'])->name('trip.view');
    Route::get('{trip_id}/seats/available',[TripController::class,'viewTripAvailableSeats'])->name('trip.view.seats.available');
    
});