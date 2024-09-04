<?php

use App\Models\RouteGroup;
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
        Schema::create('route_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route');
            $table->boolean('status')->default(true);
            $table->string('permission_name');
            $table->foreignIdFor(RouteGroup::class);
            $table->integer('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_items');
    }
};
