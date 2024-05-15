<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogVideoToolsTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_video_tools_tutorials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tools_tutorial_id')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::drop('log_video_tools_tutorials');
    }
}
