<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<2;$i++){
            $city = $faker->city;
            DB::table('teams')->insert([
                'name' => $city . ' FC',
                'logo' => 'gs://logo/'.$city.' FC.png',
                'year' => 1900,
                'address' => $faker->address,
                'city' => $city
            ]);
        }
    }
}
