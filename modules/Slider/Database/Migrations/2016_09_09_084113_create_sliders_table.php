<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('order');
            $table->timestamps();
        });
        Schema::create('sliders_slides', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('slider_id');
            $table->integer('order');
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
        Schema::drop('sliders');
        Schema::drop('sliders_slides');
    }

}
