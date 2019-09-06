<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatternTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattern_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('disease_id')->unsigned()->onDelete('cascade');
            $table->string('case_id');
            $table->integer('case_freq')->default(0);
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pattern_tracks');
    }
}
