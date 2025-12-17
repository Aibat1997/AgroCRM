<?php

namespace App\Services;

use App\DTO\LaboratoryCalculationDTO;
use App\Models\LaboratoryCalculation;
use Illuminate\Support\Facades\Auth;

class LaboratoryCalculationService
{
    public static function storeCalculation(LaboratoryCalculationDTO $dto): LaboratoryCalculation
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $dto->physical_weight = $dto->gross_weight - $dto->container_weight;
        $dto->estimated_weight = round(((100 - $dto->actual_contamination) / (100 - 2)) * $dto->physical_weight);
        $dto->conditioned_weight = round(((100 + 9) / (100 + $dto->actual_humidity)) * $dto->estimated_weight);
        $laboratoryCalculation = $user->laboratory_calculations()->create($dto->toArray());

        return $laboratoryCalculation;
    }

    public static function updateCalculation(LaboratoryCalculationDTO $dto, LaboratoryCalculation $laboratoryCalculation): LaboratoryCalculation
    {
        $dto->physical_weight = $dto->gross_weight - $dto->container_weight;
        $dto->estimated_weight = round(((100 - $dto->actual_contamination) / (100 - 2)) * $dto->physical_weight);
        $dto->conditioned_weight = round(((100 + 9) / (100 + $dto->actual_humidity)) * $dto->estimated_weight);
        $laboratoryCalculation->update($dto->toArray());

        return $laboratoryCalculation;
    }
}
