<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideoCongratsTypeRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_congrats_type_ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_rank')->nullable();
            $table->string('check_active')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video_congrats_type_ranks');
    }
}
