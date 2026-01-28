<?php

namespace App\Services;

use App\DTO\CompanyDTO;
use App\Models\Company;
use App\Contracts\ImageUploadServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class CompanyService
{
    public function __construct(
        private readonly ImageUploadServiceInterface $imageUploadService,
    ) {}

    /**
     * Create a new company
     *
     * @throws Exception
     */
    public function store(CompanyDTO $dto): Company
    {
        try {
            $imageUrl = $this->handleImageUpload($dto->logo);

            return Company::create([
                'parent_id' => $dto->parent_id,
                'name' => $dto->name,
                'logo' => $imageUrl,
            ]);
        } catch (Exception $e) {
            Log::error('Failed to store company', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Update an existing company
     *
     * @throws ModelNotFoundException|Exception
     */
    public function update(CompanyDTO $dto, Company $company): Company
    {
        try {
            $updateData = [
                'parent_id' => $dto->parent_id,
                'name' => $dto->name,
                'logo' => $dto->logo,
            ];

            if (!is_null($dto->logo)) {
                $updateData['logo'] = $this->handleImageUpload($dto->logo);
            }

            $company->update($updateData);

            return $company;
        } catch (Exception $e) {
            Log::error('Failed to update company', [
                'error' => $e->getMessage(),
                'company_id' => $company->id,
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Handle image upload with error handling
     */
    private function handleImageUpload(?UploadedFile $image = null): ?string
    {
        if ($image === null) {
            return null;
        }

        try {
            return $this->imageUploadService->upload($image, 'company-logos');
        } catch (Exception $e) {
            Log::error('Image upload failed', ['error' => $e->getMessage()]);
            throw new Exception('Failed to upload image: ' . $e->getMessage());
        }
    }
}
