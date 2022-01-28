<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,25) as $value){
            DB::table('users')->insert([
                'name' => $faker->name,
                'taxID' => $faker->unique->randomNumber($nbDigits = 9,$strict = false),
                'email' => $faker->email,
                'address' => $faker->address,
                'password' => $faker->password,
            ]);
        }
    }
}
