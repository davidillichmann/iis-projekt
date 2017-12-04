<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIisInterpretTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iis_interpret', function (Blueprint $table) {
            $table->increments('iis_interpretid')->unsigned();
            $table->string('name');
            $table->string('members');
            $table->string('genre');
            $table->string('publisher');
            $table->string('image');
            $table->string('description');
            $table->timestamp('formed_at');
            $table->timestamps();
            $table->index('iis_interpretid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iis_interpret');
    }
}
