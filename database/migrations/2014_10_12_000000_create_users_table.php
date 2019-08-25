<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique(); 
            $table->string('age')->nullable();

            $table->string('location')->nullable();
            $table->string('telephone')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_image')->nullable()->default('profile.jpg');
            $table->string('password');
            $table->string('role')->default('subscriber')->nullable();
            $table->string('status')->default('Pending')->nullable();
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
