<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('position')->nullable();
            $table->string('organization_code')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('area')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('group_code')->nullable();
            $table->string('license')->nullable();
            $table->date('license_start')->nullable();
            $table->date('license_expire')->nullable();
            $table->string('ic_license')->nullable();
            $table->date('ic_license_start')->nullable();
            $table->date('ic_license_expire')->nullable();
            $table->string('clm')->nullable();
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
