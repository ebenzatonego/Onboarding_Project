<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsPhotoGalleryToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('photo_content');
            $table->dropColumn('photo_cover');
            $table->dropColumn('link_video');
            $table->dropColumn('user_id');
            $table->dropColumn('link_content');
            $table->dropColumn('title_link_content');
            $table->dropColumn('user_like');
            $table->dropColumn('user_dislike');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
