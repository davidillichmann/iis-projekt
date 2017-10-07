<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_interpretTableSeeder extends Seeder
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
        DB::table('iis_interpret')->insert([
          'name' => $faker->sentence(3, true),
          'members' => $faker->sentence(3, true),
          'genre' => $faker->randomElement($array = array ('pop','rock','rap', 'metal', 'punk')),
          'publisher' => $faker->word(),
          'image' => $faker->imageUrl($width = 640, $height = 480),
          'formed_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
          ]);
      }

    }
}
