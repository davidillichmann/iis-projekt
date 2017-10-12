<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisFestivalYearIisStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_festival_year_iis_stage', function (Blueprint $table) {
            $table->increments('iis_festival_year_iis_stageid');
//            $table->foreign('iis_festival_yearid')->references('iis_festival_yearid')->on('iis_festival');
//            $table->foreign('iis_stageid')->references('iis_stageid')->on('iis_stage');
            $table->integer('iis_festival_yearid');
            $table->integer('iis_stageid');
            $table->timestamps();
            $table->index([
                'iis_festival_year_iis_stageid',
                'iis_festival_yearid',
                'iis_stageid'
            ], 'iis_festival_year_iis_stage_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_festival_year_iis_stage');
    }
}