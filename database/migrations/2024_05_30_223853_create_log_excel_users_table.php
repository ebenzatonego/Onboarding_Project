<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogExcelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_excel_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('name_file')->nullable();
            $table->longText('link_file')->nullable();
            $table->string('user_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_excel_users');
    }
}
