<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_article')->nullable();
            $table->string('type_article')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('check_all_day_start')->nullable();
            $table->string('check_all_day_end')->nullable();
            $table->longText('detail')->nullable();
            $table->string('photo')->nullable();
            $table->longText('link_video')->nullable();
            $table->longText('link_lms')->nullable();
            $table->longText('like')->nullable();
            $table->longText('fav')->nullable();
            $table->longText('share')->nullable();
            $table->longText('user_view')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trainings');
    }
}
