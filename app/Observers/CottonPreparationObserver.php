<?php

namespace App\Observers;

use App\Models\CottonPreparation;

class CottonPreparationObserver
{
    /**
     * Handle the CottonPreparation "saving" event.
     */
    public function saving(CottonPreparation $cottonPreparation): void
    {
        if (!is_null($cottonPreparation->gross_weight) && !is_null($cottonPreparation->container_weight)) {
            $cottonPreparation->physical_weight = $cottonPreparation->gross_weight - $cottonPreparation->container_weight;
        }
        if (!is_null($cottonPreparation->contamination) && !is_null($cottonPreparation->physical_weight)) {
            $cottonPreparation->estimated_weight = round(((100 - $cottonPreparation->contamination) / (100 - 2)) * $cottonPreparation->physical_weight);
        }
        if (!is_null($cottonPreparation->humidity) && !is_null($cottonPreparation->estimated_weight)) {
            $cottonPreparation->conditioned_weight = round(((100 + 9) / (100 + $cottonPreparation->humidity)) * $cottonPreparation->estimated_weight);
        }
    }

    /**
     * Handle the CottonPreparation "created" event.
     */
    public function created(CottonPreparation $cottonPreparation): void
    {
        //
    }

    /**
     * Handle the CottonPreparation "updated" event.
     */
    public function updated(CottonPreparation $cottonPreparation): void
    {
        //
    }

    /**
     * Handle the CottonPreparation "deleted" event.
     */
    public function deleted(CottonPreparation $cottonPreparation): void
    {
        //
    }

    /**
     * Handle the CottonPreparation "restored" event.
     */
    public function restored(CottonPreparation $cottonPreparation): void
    {
        //
    }

    /**
     * Handle the CottonPreparation "force deleted" event.
     */
    public function forceDeleted(CottonPreparation $cottonPreparation): void
    {
        //
    }
}
