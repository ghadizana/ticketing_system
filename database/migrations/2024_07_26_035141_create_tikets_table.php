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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id('idTiket');
            $table->unsignedBigInteger('idProyek');
            $table->string('judul');
            $table->string('deskripsi');
            $table->enum('kategori', ['Bugs', 'General', 'Question', 'Request Change']);
            $table->enum('prioritas', ['Low', 'Normal', 'High', 'Urgent', 'Immediete']);
            $table->enum('severity', ['Minor', 'Mayor']);
            $table->unsignedBigInteger('picRs');
            $table->string('alasanPermintaan');
            $table->string('dampak');

            $table->foreign('idProyek')->references('idProyek')->on('proyeks');
            $table->foreign('picRs')->references('userId')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
