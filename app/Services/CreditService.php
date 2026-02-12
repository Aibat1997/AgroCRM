<?php

namespace App\Services;

use App\DTO\CreditDTO;
use App\Enums\CreditStatus;
use App\Models\Credit;
use Exception;
use Illuminate\Support\Facades\Log;

class CreditService
{
    /**
     * Create a new credit
     *
     * @throws Exception
     */
    public function store(CreditDTO $dto): Credit
    {
        try {
            $credit = Credit::create([
                'company_id' => $dto->company_id,
                'bank_name' => $dto->bank_name,
                'amount' => $dto->amount,
                'term_in_months' => $dto->term_in_months,
                'payment_frequency_id' => $dto->payment_frequency_id,
                'payment_frequency_amount' => $dto->payment_frequency_amount,
                'description' => $dto->description,
                'receipt_date' => today()->toDateString(),
                'status' => CreditStatus::ACTIVE->value,
            ]);

            return $credit;
        } catch (Exception $e) {
            Log::error('Failed to store credit', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }
}
