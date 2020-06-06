<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        for($i=0;$i<10;$i++){
            DB::table('teams')->insert([
                'name' => $faker->firstName,
                'logo' => 'gs://logo/'.$faker->firstName.'.png',
                'year' => 1900,
                'address' => $faker->address,
                'city' => $faker->city
            ]);
        }
    }
}
