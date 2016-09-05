<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('station_id');
            $table->integer('order');
            $table->timestamps();
        });
        Schema::create('teams_members', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('position');
            $table->string('tel');
            $table->string('mail');
            $table->string('photo');
            $table->integer('team_id');
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
        Schema::drop('team');
    }

}
