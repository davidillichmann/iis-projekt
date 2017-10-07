<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_ticketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,300) as $index){
        DB::table('iis_ticket')->insert([
          'iis_userid' => $faker->numberBetween(1,101),
          'iis_ticket_typeid' => $faker->numberBetween(1,300),
          'code' => '123456789ABCDEFG01012017',
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
