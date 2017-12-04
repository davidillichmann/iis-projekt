<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_stageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();
      $i = 1;
      foreach(range(1,4) as $index){
          DB::table('iis_stage')->insert([
              'name' => $faker->word(),
              'iis_festivalid' => $faker->numberBetween(1,2),
              'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
              'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
          ]);
      }

    }
}
