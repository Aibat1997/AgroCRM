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
        Schema::create('transaction_form_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('field_title_ru');
            $table->string('field_title_kk');
            $table->string('field_tag');
            $table->string('field_name')->unique();
            $table->string('field_type')->nullable();
            $table->string('field_values_url')->nullable();
            $table->string('field_attributes')->nullable();
            $table->text('field_validation')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_form_fields');
    }
};
