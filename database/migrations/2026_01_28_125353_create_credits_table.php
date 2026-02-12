<?php

use App\Enums\CreditStatus;
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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict');
            $table->string('bank_name')->index();
            $table->unsignedInteger('amount');
            $table->unsignedTinyInteger('term_in_months');
            $table->foreignId('payment_frequency_id')->constrained('payment_frequencies')->onDelete('cascade');
            $table->unsignedMediumInteger('payment_frequency_amount');
            $table->string('description');
            $table->date('receipt_date')->index();
            $table->string('status')->default(CreditStatus::ACTIVE->value)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
