<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisUserIisInterpretTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_user_iis_interpret', function (Blueprint $table) {
            $table->increments('iis_user_iis_interpretid');
//            $table->foreign('iis_userid')->references('iis_userid')->on('iis_user');
//            $table->foreign('iis_interpretid')->references('iis_interpretid')->on('iis_interpret');
            $table->integer('iis_userid');
            $table->integer('iis_interpretid');
            $table->timestamps();
            $table->index([
                'iis_user_iis_interpretid',
                'iis_interpretid',
                'iis_userid'
            ], 'iis_user_iis_interpret_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_user_iis_interpret');
    }
}
