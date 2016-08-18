<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('cars_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('cars_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('cars_companies')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('cars_specifics_emission_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('cars_specifics_fuels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('cars_specifics_emission_stickers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('cars_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('first_registration');
            $table->float('price');
            $table->enum('vatable', [true, false]);
            $table->enum('damaged_and_unrepaired', [true, false]);
            $table->integer('category_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('cars_categories')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('cars_companies')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('cars_models')->onDelete('cascade');
            $table->integer('mobile_id');
            $table->timestamps();
        });

        Schema::create('cars_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('cars_specifics_fuel_consumptions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('envkv_compliant', [true, false]);
            $table->float('co2_emission');
            $table->float('inner');
            $table->float('outer');
            $table->float('combined');
            $table->string('unit');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('cars_specifics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fuel_id')->unsigned();
            $table->integer('fuel_consumption_id')->unsigned();
            $table->integer('emission_class_id')->unsigned();
            $table->integer('emission_sticker_id')->unsigned();
            $table->foreign('fuel_id')->references('id')->on('cars_specifics_fuels')->onDelete('cascade');
            $table->foreign('fuel_consumption_id')->references('id')->on('cars_specifics_fuel_consumptions')->onDelete('cascade');
            $table->foreign('emission_class_id')->references('id')->on('cars_specifics_emission_classes')->onDelete('cascade');
            $table->foreign('emission_sticker_id')->references('id')->on('cars_specifics_emission_stickers')->onDelete('cascade');
            $table->integer('car_id');
            $table->timestamps();
        });

        Schema::create('cars_features_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feature_id')->unsigned();
            $table->integer('car_id')->unsigned();
            $table->foreign('feature_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
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
        Schema::drop('cars');
        Schema::drop('cars_photos');
        Schema::drop('cars_features');
        Schema::drop('cars_specifics');
        Schema::drop('cars_specifics_emission_stickers');
        Schema::drop('cars_specifics_fuel_consumptions');
        Schema::drop('cars_specifics_emission_classes');
        Schema::drop('cars_features_cars');
        Schema::drop('cars_models');
        Schema::drop('cars_companies');
        Schema::drop('cars_categories');
    }
}
