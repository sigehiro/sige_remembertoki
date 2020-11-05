<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            //画像未選択時に
            $icon = '';

            // $table->increments('id');
            // $table->string('name');
            // $table->string('email')->unique();
            $table->tinyInteger('gender');
            $table->tinyInteger('age')->unsigned();
            $table->string('address');
            $table->text('intro')->nullable();
            $table->longText('img')->nullable();
            $table->string('occupation');
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
