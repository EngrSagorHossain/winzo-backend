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
        Schema::create('message_room_lists', function (Blueprint $table) {
            $table->id();
            $table->string('room_pear');
            $table->unsignedBigInteger('receiver_id');  
             $table->unsignedBigInteger('sender_id'); // Using unsignedBigInteger as it's typically the data type for id columns
            $table->timestamps();
    
            // Creating a foreign key constraint
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('message_room_lists');
    }
};
