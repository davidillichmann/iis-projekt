<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_festival_iis_stageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,30) as $index){
        DB::table('iis_festival_iis_stage')->insert([
          'iis_festivalid' => $faker->numberBetween(1,5),
          'iis_stageid' => $faker->numberBetween(1,5),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
