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
        Schema::create('komentars', function (Blueprint $table) {
            $table->id('idKomentar');
            $table->unsignedBigInteger('idTiket');
            $table->unsignedBigInteger('userId');
            $table->text('komentar');

            $table->foreign('idTiket')->references('idTiket')->on('tikets');
            $table->foreign('userId')->references('userId')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
