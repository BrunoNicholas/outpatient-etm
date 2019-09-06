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
            $table->integer('applicant')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('department')->nullable();
            $table->string('reason');
            $table->text('description')->nullable();
            $table->date('date_from')->nullable();
            $table->string('date_to')->default('open')->nullable();
            $table->string('priority')->default('normal')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('applicant')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
