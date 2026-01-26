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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('real_estate_type_id')->constrained('real_estate_types')->onDelete('cascade');
            $table->string('address');
            $table->decimal('area', 8, 2);
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->string('cadastral_number')->nullable();
            $table->date('rented_from')->nullable();
            $table->date('rented_to')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
