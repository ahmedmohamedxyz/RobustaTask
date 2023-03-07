<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bus = Bus::find(1);

        Trip::create([
            'bus_id'=>$bus->id,
        ]);
    }
}
