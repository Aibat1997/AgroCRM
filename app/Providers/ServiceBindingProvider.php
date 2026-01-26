<?php

namespace App\Providers;

use App\Services\Contracts\DocumentUploadServiceInterface;
use App\Services\Contracts\ImageUploadServiceInterface;
use App\Services\DocumentUploadService;
use App\Services\ImageUploadService;
use Illuminate\Support\ServiceProvider;

class ServiceBindingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Services  
        $this->app->bind(ImageUploadServiceInterface::class, ImageUploadService::class);
        $this->app->bind(DocumentUploadServiceInterface::class, DocumentUploadService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
