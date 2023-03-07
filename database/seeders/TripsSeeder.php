<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('station_trip')->insert([
            ['trip_id'=>1,'station_id'=>1],
            ['trip_id'=>1,'station_id'=>3],
            ['trip_id'=>1,'station_id'=>4],
            ['trip_id'=>1,'station_id'=>5],
        ]);
    }
}
