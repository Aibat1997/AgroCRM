<?php

namespace App\Services;

use App\DTO\ClientDTO;
use App\DTO\RealEstateRentalDTO;
use App\Models\Client;
use App\Models\RealEstateRental;
use App\Contracts\DocumentUploadServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class RealEstateRentalService
{
    public function __construct(
        private readonly ClientService $clientService,
        private readonly DocumentUploadServiceInterface $documentUploadService,
    ) {}

    /**
     * Create a new real estate rental
     *
     * @throws Exception
     */
    public function store(RealEstateRentalDTO $dto): RealEstateRental
    {
        try {
            $documentUrl = $this->handleDocumentUpload($dto->contract);
            $client = $this->findOrCreateClient($dto);

            return RealEstateRental::create([
                'real_estate_id' => $dto->real_estate_id,
                'client_id' => $client->id,
                'from_date' => $dto->from_date,
                'to_date' => $dto->to_date,
                'payment_frequency_id' => $dto->payment_frequency_id,
                'amount' => $dto->amount,
                'area' => $dto->area,
                'unit_id' => $dto->unit_id,
                'contract' => $documentUrl,
                'note' => $dto->note,
            ]);
        } catch (Exception $e) {
            Log::error('Failed to store real estate rental', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Update an existing real estate rental
     *
     * @throws ModelNotFoundException|Exception
     */
    public function update(RealEstateRentalDTO $dto, RealEstateRental $realEstateRental): RealEstateRental
    {
        try {
            $client = $this->findOrCreateClient($dto);

            $updateData = [
                'real_estate_id' => $dto->real_estate_id,
                'client_id' => $client->id,
                'from_date' => $dto->from_date,
                'to_date' => $dto->to_date,
                'payment_frequency_id' => $dto->payment_frequency_id,
                'amount' => $dto->amount,
                'area' => $dto->area,
                'unit_id' => $dto->unit_id,
                'note' => $dto->note,
            ];

            if (!is_null($dto->contract)) {
                $updateData['contract'] = $this->handleDocumentUpload($dto->contract);
            }

            $realEstateRental->update(array_filter($updateData));

            return $realEstateRental;
        } catch (Exception $e) {
            Log::error('Failed to update real estate rental', [
                'error' => $e->getMessage(),
                'real_estate_rental_id' => $realEstateRental->id,
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Handle document upload with error handling
     */
    private function handleDocumentUpload(?UploadedFile $document = null): ?string
    {
        if ($document === null) {
            return null;
        }

        try {
            return $this->documentUploadService->upload($document, 'estate_rentals/contracts');
        } catch (Exception $e) {
            Log::error('Document upload failed', ['error' => $e->getMessage()]);
            throw new Exception('Failed to upload document: ' . $e->getMessage());
        }
    }

    /**
     * Find existing client or create a new one
     */
    private function findOrCreateClient(RealEstateRentalDTO $dto): Client
    {
        $client = Client::where('identifier', $dto->tenant_identifier)->first();

        if (!$client) {
            $clientDTO = new ClientDTO(
                name: $dto->tenant_name,
                identifier: $dto->tenant_identifier,
                phone: $dto->tenant_phone
            );

            $client = $this->clientService->store($clientDTO);
        }

        return $client;
    }
}
