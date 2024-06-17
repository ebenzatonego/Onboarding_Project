<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatorToActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activitys', function (Blueprint $table) {
            $table->string('creator')->nullable();
            $table->string('status')->nullable();
            $table->datetime('datetime_start')->nullable();
            $table->datetime('datetime_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activitys', function (Blueprint $table) {
            //
        });
    }
}
