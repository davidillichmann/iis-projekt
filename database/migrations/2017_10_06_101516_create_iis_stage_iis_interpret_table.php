<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisStageIisInterpretTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_stage_iis_interpret', function (Blueprint $table) {
            $table->increments('iis_stage_iis_interpretid');
            $table->integer('iis_stageid')->unsigned();
            $table->integer('iis_interpretid')->unsigned();
            $table->foreign('iis_stageid')->references('iis_stageid')->on('iis_stage');
            $table->foreign('iis_interpretid')->references('iis_interpretid')->on('iis_interpret');
            $table->timestamp('date');
            $table->timestamps();
            $table->index([
                'iis_stage_iis_interpretid',
                'iis_stageid',
                'iis_interpretid'
            ], 'iis_stage_iis_interpret_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_stage_iis_interpret');
    }
}
