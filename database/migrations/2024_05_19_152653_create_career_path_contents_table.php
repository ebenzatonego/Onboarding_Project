<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCareerPathContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_path_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('career_path_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('icon')->nullable();
            $table->string('read')->nullable();
            $table->string('recommend')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('pdf_file')->nullable();
            $table->longText('photo')->nullable();
            $table->longText('video')->nullable();
            $table->string('number')->nullable();
            $table->longText('user_download_pdf')->nullable();
            $table->longText('user_view')->nullable();
            $table->longText('log_video')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('career_path_contents');
    }
}
