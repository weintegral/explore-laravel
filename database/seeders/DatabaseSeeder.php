<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            FlightSeeder::class,
        ]);
        
        DB::table('users')->insert([
            'name' => 'gopibabus',
            'email' => 'gopi@gmail.com',
            'password' => 'password',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
    }
}
