<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('photo_content')->nullable();
            $table->string('photo_cover')->nullable();
            $table->longText('link_video')->nullable();
            $table->string('user_id')->nullable();
            $table->longText('link_content')->nullable();
            $table->string('title_link_content')->nullable();
            $table->longText('user_like')->nullable();
            $table->longText('user_dislike')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
