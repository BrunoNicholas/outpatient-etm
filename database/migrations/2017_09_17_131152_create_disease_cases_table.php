<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('disease_id')->unsigned()->onDelete('cascade');
            $table->string('trmt_plan');
            $table->string('case_id');
            $table->text('description');
            $table->string('status');
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('diseases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disease_cases');
    }
}
