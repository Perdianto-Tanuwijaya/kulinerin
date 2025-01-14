<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->enum('role',['1', '2', '3']);
            $table->string('restaurantName')->nullable();
            $table->string('restaurantPhoneNumber')->nullable();
            $table->string('restaurantLocation')->nullable();
            $table->string('restaurantDescription')->nullable();
            // $table->string('restaurantDescription')->nullable();
            $table->string('operationalHours')->nullable();
            $table->string('restaurantCity')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};