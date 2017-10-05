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
//            $table->foreign('iis_stageid')->references('iis_stageid')->on('iis_stage');
//            $table->foreign('iis_interpretid')->references('iis_interpretid')->on('iis_interpret');
            $table->integer('iis_stageid');
            $table->integer('iis_interpretid');
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
