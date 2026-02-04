<?php

use App\Enums\DebtStatus;
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
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict');
            $table->foreignId('client_id')->constrained('clients')->onDelete('restrict');
            $table->unsignedInteger('amount');
            $table->unsignedTinyInteger('percent')->default(0);
            $table->date('issued_at')->index();
            $table->date('due_date')->index();
            $table->string('description')->nullable();
            $table->boolean('is_client_owes')->default(true)->index()->comment('true: client owes company, false: company owes client');
            $table->string('status')->default(DebtStatus::ACTIVE->value)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
