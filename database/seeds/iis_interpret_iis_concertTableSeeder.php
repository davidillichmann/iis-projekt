<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_interpret_iis_concertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,90) as $index){
        DB::table('iis_interpret_iis_concert')->insert([
          'iis_interpretid' => $faker->numberBetween(1, 30),
          'iis_concertid' => $faker->numberBetween(1,10),
          'order' => $faker->numberbetween(1,5),
          'date' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
