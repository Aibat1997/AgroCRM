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
        Schema::create('laboratory_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('variety');
            $table->string('picking_type');
            $table->unsignedSmallInteger('pile');
            $table->unsignedSmallInteger('batch');
            $table->unsignedSmallInteger('gross_weight');
            $table->unsignedSmallInteger('container_weight');
            $table->unsignedSmallInteger('physical_weight');
            $table->decimal('actual_contamination', 8, 2);
            $table->unsignedSmallInteger('estimated_weight');
            $table->decimal('actual_humidity', 8, 2);
            $table->unsignedSmallInteger('conditioned_weight');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
