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
        Schema::create('real_estate_rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('real_estate_id')->constrained('real_estates')->onDelete('cascade');
            $table->string('tenant_name');
            $table->string('tenant_phone');
            $table->string('tenant_identifier')->nullable();
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->foreignId('payment_frequency_id')->constrained('payment_frequencies')->onDelete('cascade');
            $table->unsignedMediumInteger('amount');
            $table->decimal('area', 8, 2)->nullable();
            $table->string('contract')->nullable();
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
        Schema::dropIfExists('real_estate_rentals');
    }
};
