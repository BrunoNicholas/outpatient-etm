<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('case_id')->unsigned()->onDelete('cascade');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('supervisor')->unsigned()->onDelete('cascade');
            $table->text('description');
            $table->string('status');
            $table->timestamps();

            $table->foreign('case_id')->references('id')->on('disease_cases')->onDelete('cascade');
            $table->foreign('supervisor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
