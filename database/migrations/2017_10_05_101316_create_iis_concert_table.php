<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisConcertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_concert', function (Blueprint $table) {
            $table->increments('iis_concertid');
//            $table->foreign('iis_eventid')->references('iis_eventid')->on('iis_event');
            $table->integer('iis_eventid');
            $table->string('name');
            $table->integer('capacity');
            $table->timestamp('date');
            $table->timestamps();
            $table->index([
                'iis_concertid',
                'iis_eventid'
            ], 'iis_concert_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_concert');
    }
}
