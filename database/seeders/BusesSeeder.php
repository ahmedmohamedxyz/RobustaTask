<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seat;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bus = Bus::create([
            'number' => 'amd123',
        ]);

        Seat::insert([
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => (string) Str::uuid(), 'bus_id' => $bus->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
