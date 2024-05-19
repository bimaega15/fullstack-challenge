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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('nama_profile');
            $table->string('email_profile');
            $table->string('foto_profile')->nullable();
            $table->date('tanggallahir_profile')->nullable();
            $table->string('notelpon_profile', 30)->nullable();
            $table->text('alamat_profile')->nullable();
            $table->text('pekerjaan_profile')->nullable();
            $table->bigInteger('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
