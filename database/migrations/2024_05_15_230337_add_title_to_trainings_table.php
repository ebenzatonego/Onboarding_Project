<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('training_type_id')->nullable();
            $table->longText('photo')->nullable();
            $table->longText('video')->nullable();
            $table->longText('user_like')->nullable();
            $table->longText('user_dislike')->nullable();
            $table->longText('user_share')->nullable();
            $table->longText('user_fav')->nullable();
            $table->longText('user_view')->nullable();
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
        Schema::table('trainings', function (Blueprint $table) {
            //
        });
    }
}
