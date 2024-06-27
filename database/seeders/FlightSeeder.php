<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::factory()
        ->count(10)
        // ->hasUsers(2) // each flight has 2 users
        ->create();
    }
}
