<?php

use App\Models\Seat;
use App\Models\Station;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('seat_id')->use(Seat::class);
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_reservations');
    }
};
