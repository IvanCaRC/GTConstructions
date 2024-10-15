<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    
        Storage::makeDirectory('users');
         \App\Models\User::factory(100)->create();

         \App\Models\User::factory()->create([
             'name' => 'Daniel Axel',
             'first_last_name' => 'Cruz',
             'second_last_name' => 'Gonzales',
             'email' => 'cupido.iacp@gmail.com',
             'number' => '9516105649',
             'status' => true,
             'password' => 'ivanaxel',
         ]);
    }
}
