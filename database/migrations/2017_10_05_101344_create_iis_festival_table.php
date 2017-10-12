<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisFestivalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_festival', function (Blueprint $table) {
            $table->increments('iis_festivalid');
            $table->integer('iis_eventid');
//            $table->foreign('iis_eventid')->references('iis_eventid')->on('iis_event');
            $table->string('frequency');
            $table->integer('length');
            $table->timestamps();
            $table->index([
                'iis_festivalid',
                'iis_eventid'
            ], 'iis_festival_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_festival');
    }
}
