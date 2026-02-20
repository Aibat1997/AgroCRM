<?php

namespace App\Services;

use App\DTO\Debt\StoreDebtDTO;
use App\DTO\Debt\UpdateDebtDTO;
use App\Enums\DebtStatus;
use App\Factories\ClientDTOFactory;
use App\Models\CottonPreparation;
use App\Models\Debt;
use App\Models\User;
use App\Services\Transaction\LoanProvisionHandler;
use App\Services\Transaction\ReceiptOfFundsFromBorrowerHandler;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DebtService
{
    /**
     * Create a new debt
     *
     * @throws Exception
     */
    public function store(StoreDebtDTO $dto, User $user): Debt
    {
        try {
            $clientService = app(ClientService::class);
            $loanProvisionHandler = app(LoanProvisionHandler::class);
            $clientDTO = ClientDTOFactory::fromStoreDebt($dto);
            $client = $clientService->findOrCreateByIdentifier($clientDTO);

            return DB::transaction(function () use ($dto, $client, $user, $loanProvisionHandler): Debt {
                $debt = Debt::create([
                    'company_id' => $dto->company_id,
                    'client_id' => $client->id,
                    'amount' => $dto->amount,
                    'percent' => $dto->percent,
                    'issued_at' => $dto->issued_at,
                    'due_date' => $dto->due_date,
                    'description' => $dto->description,
                    'status' => DebtStatus::ACTIVE->value,
                ]);

                $loanProvisionHandler->handle($debt, $user);

                return $debt;
            });
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
    public function update(UpdateDebtDTO $dto, User $user, Debt $debt): Debt
    {
        try {
            $receiptOfFundsFromBorrowerHandler = app(ReceiptOfFundsFromBorrowerHandler::class);
            $receiptOfFundsFromBorrowerHandler->handle($dto, $user, $debt);

            return $debt;
        } catch (Exception $e) {
            Log::error('Failed to receive funds from borrower', [
                'error' => $e->getMessage(),
                'debt_id' => $debt->id,
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    public function getDebtPayingWithCottonInfo(CottonPreparation $cottonPreparation): array
    {
        $baseQuery = Debt::where('client_id', $cottonPreparation->client_id)->where('status', DebtStatus::ACTIVE->value);
        $advanceDebts = (clone $baseQuery)->where('percent', 0)->sum('amount');
        $percentDebts = (clone $baseQuery)->where('percent', '>', 0)
            ->toBase()
            ->selectRaw('percent, SUM(amount) as total_amount, COUNT(*) as count')
            ->groupBy('percent')
            ->get();

        foreach ($percentDebts as $percentDebtsItem) {
            $percentPricePerKg = $cottonPreparation->price_per_kg - (($cottonPreparation->price_per_kg * $percentDebtsItem->percent) / 100);
            $percentDebtsItem->debt_cotton_kg = (int) ($percentDebtsItem->total_amount / $percentPricePerKg);
        }

        return [
            'all_debts' => $percentDebts->sum('total_amount') + $advanceDebts,
            'percent_debts' => $percentDebts,
            'advance_debts' => $advanceDebts,
        ];
    }
}
