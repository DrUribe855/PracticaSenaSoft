<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Models\User;
use \App\Models\Store;
use \App\Models\UserStore;
use \App\Models\Product;
use \App\Models\Order;
use \App\Models\OrderProduct;
// use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->fake_user();
        $this->faker_store();
        $this->faker_user_store();
        $this->faker_product();
        $this->faker_order();
        $this->faker_order_product();
    }

    public function fake_user(){
        // Role::create(['name' => 'Administrador']);
        // Role::create(['name' => 'Cliente']);
        $faker = Faker::create();
        $document = 108800;
        $phone_number = 3217076300;
        for ($i=0; $i < 10; $i++) { 
            User::insert([
                'document' => $document,
                'name' => $faker->firstName(),
                'phone_number' => $phone_number++,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt($document),
            ]);
            $document++;
        }
    }

    public function faker_store(){
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
            Store::insert([
                'store_name' => $faker->company(),
                'address' => $faker->address(),
                'status' => true,
            ]);
        }
    }

    public function faker_user_store(){
        for ($i=0; $i < 10; $i++) { 
            $store_id = rand(1,10);
            $document = rand(1,10);
            UserStore::insert([
                'user_id' => $document,
                'store_id' => $store_id,
            ]);
        }
    }

    public function faker_product(){
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
            Product::insert([
                'product_name' => $faker->word(),
                'price' => $faker->randomFloat(4,1000,100000),
                'stock' => $faker->numberBetween(100,10000),
                'status' => true,
            ]);
        }
    }

    public function faker_order(){
        for ($i=0; $i < 10; $i++) {
            $store_id = rand(1,10);
            Order::insert([
                'store_id' => $store_id,
                'total' => 10000,
            ]);
        } 
    }

    public function faker_order_product(){
        for ($i=0; $i < 10; $i++) { 
            $order_id = rand(1,10);
            $product_id = rand(1,10);
            OrderProduct::insert([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'quantity' => 100,
            ]);
        }
    }
}
