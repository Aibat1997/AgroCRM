<?php

namespace App\Observers;

use App\FileSystem\UploadDocument;
use App\Models\RealEstateRental;

class RealEstateRentalObserver
{
    /**
     * Handle the Company "saving" event.
     */
    public function saving(RealEstateRental $realEstateRental): void
    {
        if (request()->file('contract')) {
            $contract = (new UploadDocument(request()->file('contract'), 'rental-contracts'))->upload();
            $realEstateRental->contract = $contract;
        }
    }

    /**
     * Handle the RealEstateRental "created" event.
     */
    public function created(RealEstateRental $realEstateRental): void
    {
        //
    }

    /**
     * Handle the RealEstateRental "updated" event.
     */
    public function updated(RealEstateRental $realEstateRental): void
    {
        //
    }

    /**
     * Handle the RealEstateRental "deleted" event.
     */
    public function deleted(RealEstateRental $realEstateRental): void
    {
        //
    }

    /**
     * Handle the RealEstateRental "restored" event.
     */
    public function restored(RealEstateRental $realEstateRental): void
    {
        //
    }

    /**
     * Handle the RealEstateRental "force deleted" event.
     */
    public function forceDeleted(RealEstateRental $realEstateRental): void
    {
        //
    }
}
