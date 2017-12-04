<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisTicketTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_ticket_type', function (Blueprint $table) {
            $table->increments('iis_ticket_typeid');
            $table->integer('iis_eventid')->unsigned();
            $table->foreign('iis_eventid')->references('iis_eventid')->on('iis_event');
            $table->string('type');
            $table->integer('price');
            $table->timestamps();
            $table->unique([
                'iis_eventid',
                'type',
            ], 'iis_ticket_type_unique');
            $table->index([
                'iis_ticket_typeid',
                'iis_eventid',
            ], 'iis_ticket_type_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_ticket_type');
    }
}
