<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sorting_order')->default(0);
            $table->boolean('status')->default(true);
            $table->char('name', 255);
            $table->float('price')->nullable();
            $table->float('share_price')->nullable();
            $table->text('description');
            $table->char('image_name', 255)->nullable();
            $table->char('preview_image_name', 255)->nullable();
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
