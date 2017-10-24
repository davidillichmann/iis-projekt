<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class iis_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create();

      DB::table('iis_user')->insert([
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('secret'),
          'phone' => $faker->randomNumber(9, false),
          'created_at' => date("Y-m-d H:i:s"), // '1979-06-09'
          'updated_at' => date("Y-m-d H:i:s") // '1979-06-09'
      ]);

      foreach(range(1,20) as $index){
        DB::table('iis_user')->insert([
          'name' => $faker->name($gender = null|'male'|'female'),
          'email' => $faker->email(),
          'password' => bcrypt('secret'),
          'phone' => $faker->randomNumber(9, false),
          'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
          'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
      }

    }
}
