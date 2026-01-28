<?php

use App\Enums\CottonPreparationStatus;
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
        Schema::create('cotton_preparations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('restrict');
            $table->foreignId('weigher_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('laboratorian_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->unsignedMediumInteger('invoice_number');
            $table->string('transport');
            $table->unsignedMediumInteger('gross_weight');
            $table->unsignedMediumInteger('container_weight');
            $table->unsignedMediumInteger('physical_weight');
            $table->string('cotton_receiving_point')->nullable();
            $table->string('selective_variety')->nullable();
            $table->string('variety')->nullable();
            $table->unsignedSmallInteger('pile')->nullable();
            $table->unsignedSmallInteger('batch')->nullable();
            $table->string('picking_type')->nullable();
            $table->decimal('contamination', 8, 2)->nullable();
            $table->unsignedMediumInteger('estimated_weight')->nullable();
            $table->decimal('humidity', 8, 2)->nullable();
            $table->unsignedMediumInteger('conditioned_weight')->nullable();
            $table->unsignedSmallInteger('price_per_kg')->nullable();
            $table->unsignedInteger('total_price')->nullable();
            $table->date('weighing_date');
            $table->date('laboratory_date')->nullable();
            $table->string('status')->default(CottonPreparationStatus::AWAITING_LABORATORIAN->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotton_preparations');
    }
};
