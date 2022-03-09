<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('register_code',20)->unique()->nullable();
            $table->string('ktp_no',16)->unique()->nullable();
            $table->string('npwp_no',20)->unique()->nullable();
            $table->string('ska_no',30)->unique()->nullable();
            $table->string('name');
            $table->string('username',20)->unique();
            $table->string('phone',13)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->smallInteger('country_id')->default(0);
            $table->smallInteger('province_id')->default(0);
            $table->integer('city_id')->default(0);
            $table->longText('address')->nullable();
            $table->smallInteger('role')->default(2);
            $table->string('st',1)->default('n');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
