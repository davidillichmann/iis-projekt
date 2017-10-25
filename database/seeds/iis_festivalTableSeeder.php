<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_festivalTableSeeder extends Seeder
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
        DB::table('iis_festival')->insert([
          'iis_eventid' => ($index+50),
          'interval' => $faker->word(),
          'order' => $faker->numberBetween(0,5),
          'end_date' => $endDate = $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'start_date' => $faker->date($format = 'Y-m-d H:i:s', $max = $endDate),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
