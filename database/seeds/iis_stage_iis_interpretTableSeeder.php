<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_stage_iis_interpretTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,5) as $index){
        DB::table('iis_stage_iis_interpret')->insert([
          'iis_interpretid' => $faker->numberBetween(1,10),
          'iis_stageid' => $faker->numberBetween(1,4),
          'date' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
