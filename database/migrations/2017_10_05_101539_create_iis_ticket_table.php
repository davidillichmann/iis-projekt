<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_ticket', function (Blueprint $table) {
            $table->increments('iis_ticketid');
//            $table->foreign('iis_userid')->references('iis_userid')->on('iis_user');
//            $table->foreign('iis_ticket_typeid')->references('iis_ticket_typeid')->on('iis_ticket_type');
            $table->integer('iis_userid');
            $table->integer('iis_ticket_typeid');
            $table->string('code');
            // TODO: UNIQUE!
//            123456789ABCDEFG01012017
//             9 rand cislic
//            6 rand pismen
//            datum ddmmyy(10. 12. 2017)
            $table->timestamps();
            $table->index([
                'iis_ticketid',
                'iis_userid',
                'iis_ticket_typeid'
            ], 'iis_ticket_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_ticket');
    }
}
