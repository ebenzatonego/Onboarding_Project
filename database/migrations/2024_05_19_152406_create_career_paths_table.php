<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCareerPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_paths', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_rank')->nullable();
            $table->string('number_story')->nullable();
            $table->string('title_story')->nullable();
            $table->longText('description_story')->nullable();
            $table->longText('photo_story')->nullable();
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
        Schema::drop('career_paths');
    }
}
