<?php

namespace App\Services;

use App\DTO\CottonPreparationLaboratorianDTO;
use App\DTO\CottonPreparationWeigherDTO;
use App\Enums\CottonPreparationStatus;
use App\Models\CottonPreparation;

class CottonPreparationService
{
    const DEFAULT_CONTAMINATION_RATE = 2;
    const DEFAULT_HUMIDITY_RATE = 9;

    public function __construct(
        private readonly CottonPurchasePriceCacheService $cottonPurchasePrice,
        private readonly ClientService $clientService
    ) {}

    public function storeWeigherData(CottonPreparationWeigherDTO $dto, int $weigher_id): CottonPreparation
    {
        $client = $this->clientService->findOrCreateByIdentifier($dto);

        $cottonPreparation = CottonPreparation::create([
            'client_id' => $client->id,
            'weigher_id' => $weigher_id,
            'invoice_number' => $dto->invoice_number,
            'transport' => $dto->transport,
            'gross_weight' => $dto->gross_weight,
            'container_weight' => $dto->container_weight,
            'physical_weight' => $dto->gross_weight - $dto->container_weight,
            'weighing_date' => $dto->weighing_date,
        ]);

        return $cottonPreparation;
    }

    public function storeLaboratorianData(CottonPreparationLaboratorianDTO $dto, CottonPreparation $cottonPreparation, int $laboratorian_id): CottonPreparation
    {
        $price_per_kg = $this->cottonPurchasePrice->getLatestCottonPurchasePrice()->price;
        $estimated_weight = round(((100 - $dto->contamination) / (100 - self::DEFAULT_CONTAMINATION_RATE)) * $cottonPreparation->physical_weight);
        $conditioned_weight = round(((100 + self::DEFAULT_HUMIDITY_RATE) / (100 + $dto->humidity)) * $estimated_weight);

        $cottonPreparation->update([
            'laboratorian_id' => $laboratorian_id,
            'cotton_receiving_point' => $dto->cotton_receiving_point,
            'selective_variety' => $dto->selective_variety,
            'variety' => $dto->variety,
            'pile' => $dto->pile,
            'batch' => $dto->batch,
            'picking_type' => $dto->picking_type,
            'contamination' => $dto->contamination,
            'estimated_weight' => $estimated_weight,
            'humidity' => $dto->humidity,
            'conditioned_weight' => $conditioned_weight,
            'price_per_kg' => $price_per_kg,
            'total_price' => $conditioned_weight * $price_per_kg,
            'laboratory_date' => $dto->laboratory_date,
            'status' => CottonPreparationStatus::AWAITING_ECONOMIST->value,
        ]);

        return $cottonPreparation;
    }
}
