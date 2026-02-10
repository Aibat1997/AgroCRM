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
        Schema::create('transaction_type_form_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_type_id')->constrained(table: 'transaction_types', indexName: 'transaction_type_id')->onDelete('cascade');
            $table->foreignId('transaction_form_field_id')->constrained(table: 'transaction_form_fields', indexName: 'transaction_form_field_id')->onDelete('cascade');
            $table->boolean('is_required')->default(false);
            $table->unsignedTinyInteger('sort_num')->default(10);

            $table->unique(['transaction_type_id', 'transaction_form_field_id'], 'transaction_type_form_fields_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_type_form_fields');
    }
};
