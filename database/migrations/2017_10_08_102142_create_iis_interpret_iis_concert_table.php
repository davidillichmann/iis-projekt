<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisInterpretIisConcertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_interpret_iis_concert', function (Blueprint $table) {
            $table->increments('iis_interpret_iis_concertid');
            $table->integer('iis_interpretid')->unsigned();
            $table->integer('iis_concertid')->unsigned();
            $table->foreign('iis_interpretid')->references('iis_interpretid')->on('iis_interpret');
            $table->foreign('iis_concertid')->references('iis_concertid')->on('iis_concert');
            $table->integer('order');
            $table->timestamp('date');
            $table->timestamps();
            $table->index([
                'iis_interpret_iis_concertid',
                'iis_interpretid',
                'iis_concertid'
            ], 'iis_interpret_iis_concert_order_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_interpret_iis_concert');
    }
}
