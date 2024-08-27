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
        Schema::table('tikets', function (Blueprint $table) {
            $table->string('label')->nullable();
            $table->unsignedBigInteger('assignTo')->nullable();
            $table->unsignedBigInteger('plAviat')->nullable();
            $table->string('persetujuan')->nullable();
            $table->date('tglPersetujuan')->nullable();
            $table->string('tag')->nullable();
            $table->integer('mandays')->nullable();
            $table->date('tglDikerjakan')->nullable();
            $table->date('dueDate')->nullable();
            $table->date('tglSelesai')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();

            $table->foreign('assignTo')->references('userId')->on('users');
            $table->foreign('plAviat')->references('userId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tikets', function (Blueprint $table) {
            //
        });
    }
};
