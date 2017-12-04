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



      foreach(range(1,100) as $index){
          $code = "";
          // 9 cislic
          for($i = 0; $i < 9; $i++)
          {
              $code .= rand(1, 9);
          }

          $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $max = strlen($characters) - 1;
          // 7 pismen
          for($i = 0; $i < 7; $i++)
          {
              $code .= $characters[mt_rand(0, $max)];
          }
          //datum
          $code .= date('dmY');

            DB::table('iis_ticket')->insert([
              'iis_userid' => $faker->numberBetween(1,21),
              'iis_ticket_typeid' => $faker->numberBetween(1,15),
              'code' => $code,
              'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
              'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
]);
      }

    }
}
