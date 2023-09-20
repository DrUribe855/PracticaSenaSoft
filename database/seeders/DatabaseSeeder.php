<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $document = 108800;
        $phone_number = 3217076300;
        for ($i=0; $i < 10; $i++) { 
            User::insert([
                'document' => $document++,
                'name' => $faker->firstName(),
                'phone_number' => $phone_number++,
                'email' => $faker->unique()->safeEmail,
                'password' => $faker->asciify('*******#!')
            ]);
        }
    }
}
