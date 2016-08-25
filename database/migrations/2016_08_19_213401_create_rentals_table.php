<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals_cars_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('order');
            $table->timestamps();
        });
        Schema::create('rentals_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('street');
            $table->string('houseno');
            $table->string('zipcode');
            $table->string('city');
            $table->string('tel');
            $table->text('openings');
            $table->integer('order');
            $table->timestamps();
        });
        Schema::create('rentals_cars_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('details');
            $table->string('photo');
            $table->float('daily_price');
            $table->integer('km_inclusive');
            $table->float('extra_km_price');
            $table->integer('cars_available');
            $table->integer('category_id')->unsigned();
            $table->integer('station_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('rentals_cars_categories')->onDelete('cascade');
            $table->foreign('station_id')->references('id')->on('rentals_stations')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('rentals_cars_classes_specifics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('name');
            $table->string('value');
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('rentals_cars_classes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('rentals_cars_classes_wishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('name');
            $table->string('value');
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('rentals_cars_classes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('rentals_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('pickup_date');
            $table->dateTime('drop_off_date');
            $table->integer('pickup_station');
            $table->integer('drop_off_station');
            $table->integer('class_id');
            $table->integer('client_id');
            $table->timestamps();
        });

        Schema::create('rentals_reservations_wishes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wish_id');
            $table->integer('reservation_id')->unsigned();
            $table->foreign('reservation_id')->references('id')->on('rentals_reservations')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('rentals_reservation_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('tel');
            $table->string('street');
            $table->string('houseno');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
            $table->integer('reservation_id')->unsigned();
            $table->foreign('reservation_id')->references('id')->on('rentals_reservations')->onDelete('cascade');
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
        Schema::drop('rentals_reservation_users');
        Schema::drop('rentals_reservations_wishes');
        Schema::drop('rentals_reservations');
        Schema::drop('rentals_cars_classes_wishes');
        Schema::drop('rentals_cars_classes_specifics');
        Schema::drop('rentals_cars_classes');
        Schema::drop('rentals_stations');
        Schema::drop('rentals_cars_categories');
    }

}
