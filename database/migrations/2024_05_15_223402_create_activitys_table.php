<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitys', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('photo')->nullable();
            $table->longText('activity_type_id')->nullable();
            $table->string('all_day')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->longText('location_detail')->nullable();
            $table->longText('link_map')->nullable();
            $table->longText('user_like')->nullable();
            $table->longText('user_dislike')->nullable();
            $table->longText('user_share')->nullable();
            $table->longText('user_fav')->nullable();
            $table->longText('user_view')->nullable();
            $table->string('sum_rating')->nullable();
            $table->longText('log_rating')->nullable();
            $table->string('highlight_number')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activitys');
    }
}
