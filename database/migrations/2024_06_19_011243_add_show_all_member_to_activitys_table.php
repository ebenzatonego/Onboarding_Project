<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShowAllMemberToActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activitys', function (Blueprint $table) {
            $table->string('show_all_member')->nullable();
            $table->string('show_rank')->nullable();
            $table->longText('show_individual')->nullable();

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
