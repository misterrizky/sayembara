<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
        });
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id')->default(0);
            $table->string('code');
            $table->string('name');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('province_id')->default(0);
            $table->string('code');
            $table->string('name');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
    }
}
