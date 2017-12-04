<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_event', function (Blueprint $table) {
            $table->increments('iis_eventid')->unsigned();
            $table->string('name');
            $table->string('location');
            $table->string('image');
            $table->string('description');
            $table->timestamps();
            $table->index('iis_eventid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_event');
    }
}
