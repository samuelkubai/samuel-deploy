<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,20) as $index)
        {
            User::create([
                'firstName' => $faker->name,
                'lastName' => $faker->name,
                'telNumber' => $faker->phoneNumber,
                'active' => '1',
                'password' => 'secret',
                'email' => $faker->email .$index,

            ]);
        }
    }
} 