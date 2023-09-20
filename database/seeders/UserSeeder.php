<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $document = 108800;
        $phone_number = 3217076300;
        for ($i=0; $i < 10; $i++) { 
            \App\Models\User::factory()->create([
                'document' => $document++,
                'name' => $faker->firstName(),
                'phone_number' => $phone_number = $phone_number + 2,
                'email' => $faker->unique()->safeEmail,
                'password' => $faker->asciify('*******#!')
            ]);
        }
    }
}
