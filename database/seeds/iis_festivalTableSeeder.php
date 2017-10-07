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
          'frequency' => $faker->word(),
          'description' => $faker->sentence(20, true),
          'length' => $faker->numberBetween(1, 10),
          'image' => $faker->imageUrl($width = 640, $height = 480),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
