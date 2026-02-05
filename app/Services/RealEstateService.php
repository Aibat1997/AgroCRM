<?php

namespace App\Services;

use App\Contracts\DocumentUploadServiceInterface;
use App\DTO\RealEstateDTO;
use App\Models\RealEstate;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RealEstateService
{
    public function __construct(
        private readonly DocumentUploadServiceInterface $documentUploadService,
    ) {}

    /**
     * Create a new real estate
     *
     * @throws Exception
     */
    public function store(RealEstateDTO $dto): RealEstate
    {
        try {
            return DB::transaction(function () use ($dto): RealEstate {
                $realEstate = RealEstate::create([
                    'real_estate_type_id' => $dto->real_estate_type_id,
                    'address' => $dto->address,
                    'area' => $dto->area,
                    'unit_id' => $dto->unit_id,
                    'cadastral_number' => $dto->cadastral_number,
                    'rented_from' => $dto->rented_from,
                    'rented_to' => $dto->rented_to,
                    'note' => $dto->note,
                ]);

                if (!is_null($dto->files)) {
                    foreach ($dto->files as $file) {
                        $realEstate->files()->create([
                            'original_name' => $file->getClientOriginalName(),
                            'url' => $this->handleDocumentUpload($file)
                        ]);
                    }
                }

                return $realEstate;
            });
        } catch (Exception $e) {
            Log::error('Failed to store real estate', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Update an existing real estate
     *
     * @throws ModelNotFoundException|Exception
     */
    public function update(RealEstateDTO $dto, RealEstate $realEstate): RealEstate
    {
        try {
            return DB::transaction(function () use ($dto, $realEstate): RealEstate {
                $realEstate->update([
                    'real_estate_type_id' => $dto->real_estate_type_id,
                    'address' => $dto->address,
                    'area' => $dto->area,
                    'unit_id' => $dto->unit_id,
                    'cadastral_number' => $dto->cadastral_number,
                    'rented_from' => $dto->rented_from,
                    'rented_to' => $dto->rented_to,
                    'note' => $dto->note,
                ]);

                if (!is_null($dto->files)) {
                    foreach ($dto->files as $file) {
                        $realEstate->files()->create([
                            'original_name' => $file->getClientOriginalName(),
                            'url' => $this->handleDocumentUpload($file)
                        ]);
                    }
                }

                return $realEstate;
            });
        } catch (Exception $e) {
            Log::error('Failed to update real estate', [
                'error' => $e->getMessage(),
                'real_estate_id' => $realEstate->id,
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Handle document upload with error handling
     */
    private function handleDocumentUpload(UploadedFile $document): string
    {
        try {
            return $this->documentUploadService->upload($document, 'real-estate/files');
        } catch (Exception $e) {
            Log::error('Document upload failed', ['error' => $e->getMessage()]);
            throw new Exception('Failed to upload document: ' . $e->getMessage());
        }
    }
}
