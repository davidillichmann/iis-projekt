<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_user_iis_interpretTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

      foreach(range(1, 60) as $index){
        DB::table('iis_user_iis_interpret')->insert([
          'iis_userid' => $faker->numberBetween(1, 21),
          'iis_interpretid' => $faker->numberBetween(1,10),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
