<?php

namespace App\Services;

use App\DTO\CottonPreparationLaboratorianDTO;
use App\DTO\CottonPreparationWeigherDTO;
use App\Models\CottonPreparation;
use Illuminate\Support\Facades\Auth;

class CottonPreparationService
{
    public static function storeWeigherData(CottonPreparationWeigherDTO $dto): CottonPreparation
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $dto->weigher_id = $user->id;
        $cottonPreparation = CottonPreparation::create($dto->toArray());

        return $cottonPreparation;
    }

    public static function storeLaboratorianData(CottonPreparationLaboratorianDTO $dto, CottonPreparation $cottonPreparation): CottonPreparation
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $dto->laboratorian_id = $user->id;
        $dto->estimated_weight = round(((100 - $dto->contamination) / (100 - 2)) * $cottonPreparation->physical_weight);
        $dto->conditioned_weight = round(((100 + 9) / (100 + $dto->humidity)) * $dto->estimated_weight);
        $cottonPreparation->update($dto->toArray());

        return $cottonPreparation;
    }
}
