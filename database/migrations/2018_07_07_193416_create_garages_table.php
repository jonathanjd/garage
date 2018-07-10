<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('address');
            $table->string('city');
            $table->string('postal');

            $table->string('title');
            $table->text('description');

            $table->date('startdate');
            $table->date('enddate');

            $table->time('starthour');
            $table->time('endhour');

            $table->string('lat');
            $table->string('lng');

            $table->integer('type_garage_id')->unsigned();
            $table->foreign('type_garage_id')->references('id')->on('type_garages');

            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garages');
    }
}
