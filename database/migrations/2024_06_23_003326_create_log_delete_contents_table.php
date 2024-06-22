<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogDeleteContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_delete_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('type')->nullable();
            $table->string('user_id')->nullable();
            $table->string('news_name')->nullable();
            $table->string('training_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('appointment_name')->nullable();
            $table->string('activity_name')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_delete_contents');
    }
}
