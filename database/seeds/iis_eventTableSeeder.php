<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_eventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

//      foreach(range(1,55) as $index){
//        DB::table('iis_event')->insert([
//          'name' => $faker->sentence(3, true),
//          'location' => $faker->sentence(2, true),
//          'image' => $faker->imageUrl($width = 1280, $height = 720),
//          'description' => $faker->sentence(20, true),
//          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
//          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
//        ]);
//      }

        foreach(range(1,5) as $index){
            DB::table('iis_event')->insert([
                'name' => $faker->sentence(3, true),
                'location' => $faker->sentence(2, true),
                'image' => $faker->imageUrl($width = 1280, $height = 720),
                'description' => $faker->sentence(20, true),
                'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
                'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
            ]);
        }

    }
}
