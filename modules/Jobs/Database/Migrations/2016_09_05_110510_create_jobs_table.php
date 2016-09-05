<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->integer('order');
            $table->timestamps();
        });
        Schema::create('jobs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('jobs_categories')->onDelete('cascade');
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
        Schema::drop('jobs');
    }

}
