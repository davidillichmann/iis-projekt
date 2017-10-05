<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisFestivalYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_festival_year', function (Blueprint $table) {
            $table->increments('iis_festival_yearid');
//            $table->foreign('iis_festivalid')->references('iis_festivalid')->on('iis_festival');
            $table->integer('iis_festivalid');
            $table->integer('order');
            $table->timestamp('date');
            $table->timestamps();
            $table->index([
                'iis_festival_yearid',
                'iis_festivalid',
            ], 'iis_festival_year_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_festival_year');
    }
}
