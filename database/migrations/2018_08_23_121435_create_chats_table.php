<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned()->onDelete('cascade');
            $table->string('sen_email');
            $table->string('sen_name')->default('Unknown')->nullable();
            $table->integer('receiver_id')->unsigned()->onDelete('cascade');
            $table->string('rec_email')->nullable();
            $table->string('topic')->nullable();
            $table->string('description');
            $table->string('sending_profile')->nullable();
            $table->string('receiving_profile')->nullable();
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
