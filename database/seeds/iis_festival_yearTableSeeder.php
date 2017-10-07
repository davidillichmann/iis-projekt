<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_festival_yearTableSeeder extends Seeder
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
        DB::table('iis_festival_year')->insert([
          'iis_festivalid' => $index,
          'order' => $faker->numberBetween(1, 10),
          'date' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
