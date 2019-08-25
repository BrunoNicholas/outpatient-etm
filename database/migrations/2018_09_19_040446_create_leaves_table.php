<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant')->unsigned()->onDelete('cascade');
            $table->integer('recipient')->unsigned()->onDelete('cascade');
            $table->string('department')->nullable();
            $table->string('reason');
            $table->text('description')->nullable();
            $table->string('date_from');
            $table->string('date_to');
            $table->string('priority');
            $table->string('status');
            $table->timestamps();

            $table->foreign('applicant')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipient')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
