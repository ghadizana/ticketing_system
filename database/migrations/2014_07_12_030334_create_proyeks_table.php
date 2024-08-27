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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id('idProyek');
            $table->string('namaProyek');
            $table->string('tipeRs');
            $table->boolean('group');
            $table->string('namaGroup');
            $table->date('tglMulai');
            $table->date('tglAkhir');
            $table->string('konsepKerjasama');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
