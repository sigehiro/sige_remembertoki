<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->integer('genre_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->longText('img')->nullable();
            $table->text('intro')->nullable();
            $table->dateTime('startTime')->nullable;
            $table->dateTime('finishTime')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
