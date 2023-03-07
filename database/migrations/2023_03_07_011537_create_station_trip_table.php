<?php

use App\Models\Station;
use App\Models\Trip;
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
        Schema::create('station_trip', function (Blueprint $table) {
            $table->foreignIdFor(Trip::class)->constrained();
            $table->foreignIdFor(Station::class)->constrained();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
