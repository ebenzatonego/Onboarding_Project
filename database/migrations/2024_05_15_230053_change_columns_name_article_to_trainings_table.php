<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsNameArticleToTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('name_article');
            $table->dropColumn('type_article');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
            $table->dropColumn('check_all_day_start');
            $table->dropColumn('check_all_day_end');
            $table->dropColumn('detail');
            $table->dropColumn('photo');
            $table->dropColumn('link_video');
            $table->dropColumn('link_lms');
            $table->dropColumn('like');
            $table->dropColumn('fav');
            $table->dropColumn('share');
            $table->dropColumn('user_view');
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
