<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('photo')->nullable();
            $table->string('type')->nullable();
            $table->longText('training_type_id')->nullable();
            $table->string('all_day')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->longText('user_like')->nullable();
            $table->longText('user_dislike')->nullable();
            $table->longText('user_share')->nullable();
            $table->longText('user_fav')->nullable();
            $table->longText('user_view')->nullable();
            $table->longText('location_detail')->nullable();
            $table->longText('link_map')->nullable();
            $table->longText('link_out')->nullable();
            $table->longText('click_link_out')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointments');
    }
}
