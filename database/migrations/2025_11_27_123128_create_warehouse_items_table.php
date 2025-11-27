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
        Schema::create('warehouse_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_id')->constrained('warehouses')->onDelete('cascade');
            $table->string('title');
            $table->unsignedMediumInteger('quantity')->default(0);
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->unsignedMediumInteger('unit_price')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_items');
    }
};
