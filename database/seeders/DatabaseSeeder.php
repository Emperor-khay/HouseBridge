<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'firstname' => 'HouseBridge',
            'lastname' => 'Admin',
            'phone' => "+234 8171552062",
            'email' => 'admin@housebridge.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('housebridgeAdmin'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
