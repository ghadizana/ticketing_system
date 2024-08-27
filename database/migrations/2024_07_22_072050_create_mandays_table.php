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
        Schema::create('mandays', function (Blueprint $table) {
            $table->id('idMandays');
            $table->unsignedBigInteger('idProyek');
            $table->integer('mandays');
            $table->date('tahun');
            $table->integer('terpakai')->nullable();
            $table->timestamps();

            $table->foreign('idProyek')->references('idProyek')->on('proyeks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandays');
    }
};
