<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideoCongratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_congrats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_video')->nullable();
            $table->string('type')->nullable();
            $table->string('for_rank')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
            $table->longText('log')->nullable();
            $table->longText('video')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video_congrats');
    }
}
