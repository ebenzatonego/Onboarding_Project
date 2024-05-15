<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideoWelcomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_welcome_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_video')->nullable();
            $table->string('type')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
            $table->longText('log')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video_welcome_pages');
    }
}
