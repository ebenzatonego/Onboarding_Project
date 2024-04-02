<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable();
            $table->string('username')->nullable();
            $table->string('account')->nullable();
            $table->string('lastname')->nullable();
            $table->string('photo')->nullable();
            $table->string('birthday')->nullable();
            $table->string('detail')->nullable();
            $table->string('agent_code')->nullable();
            $table->string('license')->nullable();
            $table->datetime('license_start')->nullable();
            $table->datetime('license_expire')->nullable();
            $table->string('agency_name')->nullable();
            $table->string('ic_license')->nullable();
            $table->string('current_rank')->nullable();
            $table->string('last_rank')->nullable();
            $table->string('supervisor_id')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
