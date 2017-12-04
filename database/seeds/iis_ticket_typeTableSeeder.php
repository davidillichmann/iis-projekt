<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_ticket_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

//      foreach(range(1,30) as $index){
//        DB::table('iis_ticket_type')->insert([
//          'iis_eventid' => $faker->numberBetween(1,15),
//          'type' => $faker->randomElement($array = array ('adult', 'student', 'child')),
//          'price' => $faker->randomNumber(4, $strict = false),
//          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
//          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
//        ]);
//      }

//    foreach(range(1,15) as $index){
//        DB::table('iis_ticket_type')->insert([
//            'iis_eventid' => $faker->numberBetween(1,15),
//            'type' => $faker->randomElement($array = array ('adult', 'student', 'child')),
//            'price' => $faker->randomNumber(4, $strict = false),
//            'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
//            'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
//        ]);
//    }

    $array = array ('adult', 'student', 'child');
    foreach(range(1, 5) as $index){
        foreach($array as $item)
        {
            DB::table('iis_ticket_type')->insert([
                'iis_eventid' => $index,
                'type' => $item,
                'price' => $faker->randomNumber(3, $strict = false),
                'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
                'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
            ]);
        }
    }


    }
}
