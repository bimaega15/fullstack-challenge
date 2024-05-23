<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_chat_id')->unsigned();
            $table->bigInteger('chat_room_id')->unsigned();
            $table->text('message');
            $table->timestamps();

            $table->foreign('user_chat_id')->references('id')->on('user_chat')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('chat_room_id')->references('id')->on('chat_room')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
