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
        Schema::create('message_lists', function (Blueprint $table) {
            $table->id();
            $table->string('room_code');
            $table->string('sender_id');
            $table->string('receiver_id');
            $table->string('messag_text')->nullable();
            $table->string('messag_file')->nullable();
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
        Schema::dropIfExists('message_lists');
    }
};
