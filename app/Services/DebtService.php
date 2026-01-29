<?php

namespace App\Services;

use App\DTO\DebtDTO;
use App\Enums\DebtStatus;
use App\Models\CottonPreparation;
use App\Models\Debt;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class DebtService
{
    public function __construct(
        private readonly ClientService $clientService,
    ) {}

    /**
     * Create a new debt
     *
     * @throws Exception
     */
    public function store(DebtDTO $dto): Debt
    {
        try {
            $client = $this->clientService->findOrCreateByIdentifier($dto);

            return Debt::create([
                'company_id' => $dto->company_id,
                'client_id' => $client->id,
                'amount' => $dto->amount,
                'percent' => $dto->percent,
                'issued_at' => today()->toDateString(),
                'due_date' => $dto->due_date,
                'description' => $dto->description,
                'is_client_owes' => $dto->is_client_owes,
                'status' => DebtStatus::ACTIVE->value,
            ]);
        } catch (Exception $e) {
            Log::error('Failed to store debt', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Update an existing debt
     *
     * @throws ModelNotFoundException|Exception
     */
    public function update(DebtDTO $dto, Debt $debt): Debt
    {
        try {
            $client = $this->clientService->findOrCreateByIdentifier($dto);

            $updateData = [
                'company_id' => $dto->company_id,
                'client_id' => $client->id,
                'amount' => $dto->amount,
                'percent' => $dto->percent,
                'issued_at' => today()->toDateString(),
                'due_date' => $dto->due_date,
                'description' => $dto->description,
                'is_client_owes' => $dto->is_client_owes,
                'status' => $dto->status,
            ];

            $debt->update($updateData);

            return $debt;
        } catch (Exception $e) {
            Log::error('Failed to update debt', [
                'error' => $e->getMessage(),
                'debt_id' => $debt->id,
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    function getDebtPayingWithCottonInfo(CottonPreparation $cottonPreparation): array
    {
        $baseQuery = Debt::where('client_id', $cottonPreparation->client_id)->where('status', DebtStatus::ACTIVE->value);
        $advanceDebts = (clone $baseQuery)->where('percent', 0)->sum('amount');
        $percentDebts = (clone $baseQuery)->where('percent', '>', 0)
            ->selectRaw('percent, SUM(amount) as total_amount, COUNT(*) as count')
            ->groupBy('percent')
            ->get();

        foreach ($percentDebts as $percentDebtsItem) {
            $precentPricePerKg = $cottonPreparation->price_per_kg - (($cottonPreparation->price_per_kg * $percentDebtsItem->percent) / 100);
            $totalDebtAmount = $percentDebtsItem->total_amount;
            $percentDebtsItem->debt_cotton_kg = (int) ($totalDebtAmount / $precentPricePerKg);
        }

        return [
            'all_debts' => $percentDebts->sum('total_amount') + $advanceDebts,
            'percent_debts' => $percentDebts,
            'advance_debts' => $advanceDebts,
        ];
    }
}
