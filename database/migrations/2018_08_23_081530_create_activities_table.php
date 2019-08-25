<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('supervisor')->unsigned()->onDelete('cascade');
            $table->integer('task')->unsigned()->onDelete('cascade');
            $table->integer('team_member')->unsigned()->onDelete('cascade');
            $table->integer('disease_case')->unsigned()->onDelete('cascade');
            $table->integer('client')->unsigned()->onDelete('cascade');
            $table->string('description');
            $table->string('status');
            $table->timestamps();

            $table->foreign('supervisor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('client')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('team_member')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('disease_case')->references('id')->on('disease_cases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
