<?php

namespace Database\Seeders;

use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Station::insert([
            ['name'=> 'Cairo','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()], 
            ['name'=> 'Giza','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()], 
            ['name'=> 'AlFayyum','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()], 
            ['name'=> 'AlMinya','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()], 
            ['name'=> 'Asyut','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()], 
            ['name'=> 'Aswan','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()], 
        ]);
    }
}
