<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_stage', function (Blueprint $table) {
            $table->increments('iis_stageid');
            $table->integer('iis_festivalid');
            $table->string('name');
            $table->timestamps();
            $table->index('iis_stageid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_stage');
    }
}
