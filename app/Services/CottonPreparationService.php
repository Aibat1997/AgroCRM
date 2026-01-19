<?php

namespace App\Services;

use App\DTO\CottonPreparationLaboratorianDTO;
use App\DTO\CottonPreparationWeigherDTO;
use App\Enums\CottonPreparationStatus;
use App\Models\CottonPreparation;
use Illuminate\Support\Facades\Auth;

class CottonPreparationService
{
    public static function storeWeigherData(CottonPreparationWeigherDTO $dto): CottonPreparation
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cottonPreparation = CottonPreparation::create([
            ...$dto->toArray(),
            'weigher_id' => $user->id,
        ]);

        return $cottonPreparation;
    }

    public static function storeLaboratorianData(CottonPreparationLaboratorianDTO $dto, CottonPreparation $cottonPreparation): CottonPreparation
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cottonPreparation->update([
            ...$dto->toArray(),
            'laboratorian_id' => $user->id,
            'status' => CottonPreparationStatus::ECONOMIST_DECISION->value,
        ]);

        return $cottonPreparation;
    }
}
