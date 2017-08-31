<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTillDeskTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('nice_name', 80);
            $table->string('iso', 2);
            $table->string('iso3', 3);
            $table->string('phone_code', 5);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('code', 10);
            $table->string('symbol', 20);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('native_name', 100);
            $table->string('code', 10);
            $table->boolean('is_active')->default(false);
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

        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('languages');
    }
}
