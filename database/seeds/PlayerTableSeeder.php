<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=1;$i<=11;$i++){
            DB::table('players')->insert([
                'name' => $faker->firstName,
                'team_id' => 1,
                'tall' => 180,
                'weight' => 75,
                'back_num' => $faker->numberBetween(0, 99)
            ]);
        }

        for($i=1;$i<=11;$i++){
            DB::table('players')->insert([
                'name' => $faker->firstName,
                'team_id' => 2,
                'tall' => 180,
                'weight' => 75,
                'back_num' => $faker->numberBetween(0, 99)
            ]);
        }
    }
}
