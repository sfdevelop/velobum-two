<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->string('image_name', 500);
            $table->string('preview_image_name', 500);
            $table->boolean('status_main')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_items');
    }
}
