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
            $table->string('name', 80)->unsigned();
            $table->string('nice_name', 80)->unsigned();
            $table->string('iso', 2)->unsigned();
            $table->string('iso3', 3)->unsigned();
            $table->string('phone_code', 5)->unsigned();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unsigned();
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unsigned();
            $table->string('code', 10)->unsigned();
            $table->string('symbol', 20)->unsigned();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });


        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unsigned();
            $table->string('native_name', 100)->unsigned();
            $table->string('code', 10)->unsigned();
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
