<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Leonardo',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => 'client'
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Micaela',
            'email' => 'developer@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => 'developer'
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Nick',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => 'client'
        ]);

        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Juegos'        
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Herramientas'      
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Ingenio'      
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Desarrollo'   
        ]);


        DB::table('applications')->insert([
            'id' => 1,
            'name' => 'Aplicacion 1',
            'image' => Str::random(10),
            'category_id' => rand(1,4),
            'user_id' => 2,
            'description' => Str::random(10),
            'status' => 'enable'
        ]);
        DB::table('applications')->insert([
            'id' => 2,
            'name' => 'Aplicacion 2',
            'image' => Str::random(10),
            'category_id' => rand(1,4),
            'user_id' => 2,
            'description' => Str::random(10),
            'status' => 'enable'
        ]);
        DB::table('applications')->insert([
            'id' => 3,
            'name' => 'Aplicacion 3',
            'image' => Str::random(10),
            'category_id' => rand(1,4),
            'user_id' => 2,
            'description' => Str::random(10),
            'status' => 'enable'
        ]);
        DB::table('applications')->insert([
            'id' => 4,
            'name' => 'Aplicacion 4',
            'image' => Str::random(10),
            'category_id' => rand(1,4),
            'user_id' => 2,
            'description' => Str::random(10),
            'status' => 'enable'
        ]);
        DB::table('applications')->insert([
            'id' => 5,
            'name' => 'Aplicacion 5',
            'image' => Str::random(10),
            'category_id' => rand(1,4),
            'user_id' => 2,
            'description' => Str::random(10),
            'status' => 'enable'
        ]);

        
        DB::table('app_prices')->insert([
            'id' => 1,
            'application_id' => 1,
            'price' => 100,
        ]);
        DB::table('app_prices')->insert([
            'id' => 2,
            'application_id' => 2,
            'price' => 200,

        ]);
        DB::table('app_prices')->insert([
            'id' => 3,
            'application_id' => 3,
            'price' => 300,

        ]);
        DB::table('app_prices')->insert([
            'id' => 4,
            'application_id' => 4,
            'price' => 400,

        ]);
        DB::table('app_prices')->insert([
            'id' => 5,
            'application_id' => 5,
            'price' => 500,

        ]);

        DB::table('purchases')->insert([
            'id' => 1,
            'application_id' => 1,
            'user_id' => 1,
            'price' => 100
        ]);
        DB::table('purchases')->insert([
            'id' => 2,
            'application_id' => 2,
            'user_id' => 3,
            'price' => 200
        ]);
        DB::table('purchases')->insert([
            'id' => 3,
            'application_id' => 3,
            'user_id' => 3,
            'price' => 300
        ]);
        DB::table('purchases')->insert([
            'id' => 4,
            'application_id' => 5,
            'user_id' => 1,
            'price' => 400
        ]);


        DB::table('wishlists')->insert([
            'id' => 1,
            'application_id' => 1,
            'user_id' => 1
        ]);
        DB::table('wishlists')->insert([
            'id' => 2,
            'application_id' => 2,
            'user_id' => 3
        ]);
        DB::table('wishlists')->insert([
            'id' => 3,
            'application_id' => 4,
            'user_id' => 3
        ]);
       

    }
}
