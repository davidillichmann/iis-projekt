<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(iis_eventTableSeeder::class);
        $this->call(iis_festivalTableSeeder::class);
        $this->call(iis_concertTableSeeder::class);
        $this->call(iis_interpretTableSeeder::class);
        $this->call(iis_stageTableSeeder::class);
        $this->call(iis_stage_iis_interpretTableSeeder::class);
        $this->call(iis_userTableSeeder::class);
        $this->call(iis_interpret_iis_concertTableSeeder::class);
        $this->call(iis_user_iis_interpretTableSeeder::class);
        $this->call(iis_ticket_typeTableSeeder::class);
        $this->call(iis_ticketTableSeeder::class);

    }
}
