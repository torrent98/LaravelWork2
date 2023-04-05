<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Mechanic;
use \App\Models\Service;
use \App\Models\Raiting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::truncate();
        Mechanic::truncate();
        Service::truncate();
        Raiting::truncate();

        User::factory(5)->create();
        Mechanic::factory(10)->create();

        $user = User::create([
            'username' => 'zarko1',
            'email' => 'zarko@gmail.com',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        $service1 = Service::create([
            'name' => 'Zamena guma'
        ]);

        $service2 = Service::create([
            'name' => 'Amortizeri popravka'
        ]);

        $service3 = Service::create([
            'name' => 'Zamena akumulatora'
        ]);

        $service4 = Service::create([
            'name' => 'Servo popravka'
        ]);

        $service5 = Service::create([
            'name' => 'Veliki servis'
        ]);

        $raiting1 = Raiting::create([
            'date_and_time' => now(),
            'user' => 2,
            'mechanic' => 1,
            'service' => 1,
            'rating' => 5,
            'note' => 'Odlicna zamena, vrlo efikasno!'
        ]);

        $raiting2 = Raiting::create([
            'date_and_time' => now(),
            'user' => 3,
            'mechanic' => 2,
            'service' => 4,
            'rating' => 5,
            'note' => 'Servo zamena po prihvatljivoj ceni uz dosta profesionalizma.'

        ]);

    }
}
