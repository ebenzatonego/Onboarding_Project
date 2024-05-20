<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactAreaSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_area_supervisors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('area')->nullable();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('account')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contact_area_supervisors');
    }
}
