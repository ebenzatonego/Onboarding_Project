<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataNewToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->longText('news_type_id')->nullable();
            $table->longText('photo_cover')->nullable();
            $table->longText('photo_gallery')->nullable();
            $table->longText('video')->nullable();
            $table->longText('user_like')->nullable();
            $table->longText('user_dislike')->nullable();
            $table->longText('user_share')->nullable();
            $table->longText('user_fav')->nullable();
            $table->longText('user_view')->nullable();
            $table->string('sum_rating')->nullable();
            $table->longText('log_rating')->nullable();
            $table->longText('highlight_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
