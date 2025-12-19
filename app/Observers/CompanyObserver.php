<?php

namespace App\Observers;

use App\FileSystem\UploadImage;
use App\Models\Company;

class CompanyObserver
{
    /**
     * Handle the Company "saving" event.
     */
    public function saving(Company $company): void
    {
        if (request()->file('logo')) {
            $logo = (new UploadImage(request()->logo))->save('logos');
            $company->logo = $logo;
        }
    }

    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "updated" event.
     */
    public function updated(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     */
    public function restored(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     */
    public function forceDeleted(Company $company): void
    {
        //
    }
}
