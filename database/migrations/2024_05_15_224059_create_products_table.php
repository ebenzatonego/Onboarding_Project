<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('photo')->nullable();
            $table->longText('product_type_id')->nullable();
            $table->longText('user_like')->nullable();
            $table->longText('user_dislike')->nullable();
            $table->longText('user_share')->nullable();
            $table->longText('user_fav')->nullable();
            $table->longText('user_view')->nullable();
            $table->string('sum_rating')->nullable();
            $table->longText('log_rating')->nullable();
            $table->longText('pdf_file')->nullable();
            $table->longText('user_download_pdf')->nullable();
            $table->string('highlight_number')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
