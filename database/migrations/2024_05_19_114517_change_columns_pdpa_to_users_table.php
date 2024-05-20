<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsPdpaToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('lastname');
            $table->dropColumn('detail');
            $table->dropColumn('agent_code');
            $table->dropColumn('license');
            $table->dropColumn('agency_name');
            $table->dropColumn('ic_license');
            $table->dropColumn('supervisor_id');
            $table->dropColumn('pdpa');
            $table->dropColumn('video_instruction');
            $table->string('phone')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('area')->nullable();
            $table->longText('address')->nullable();
            $table->string('account_upper_al')->nullable();
            $table->string('account_group_manager')->nullable();
            $table->string('account_area_supervisor')->nullable();
            $table->string('check_video_welcome_page')->nullable();
            $table->string('check_video_congratulation')->nullable();
            $table->string('check_content_popup')->nullable();
            $table->string('alert_noti')->nullable();
            $table->string('check_pdpa')->nullable();
            $table->string('check_coc')->nullable();
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
