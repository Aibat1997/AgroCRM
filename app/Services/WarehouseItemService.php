<?php

namespace App\Services;

use App\DTO\WarehouseItemDTO;
use App\Models\Currency;
use App\Models\WarehouseItem;
use App\Contracts\ImageUploadServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class WarehouseItemService
{
    public function __construct(
        private readonly ImageUploadServiceInterface $imageUploadService,
        private readonly CurrencyCacheService $currencyCacheService
    ) {}

    /**
     * Create a new warehouse item
     * 
     * @var Currency $currency 
     * @throws Exception
     */
    public function store(WarehouseItemDTO $dto): WarehouseItem
    {
        try {
            $imageUrl = $this->handleImageUpload($dto->image);
            $currency = $this->getCurrency($dto->currency_id);

            return WarehouseItem::create([
                'warehouse_id' => $dto->warehouse_id,
                'title' => $dto->title,
                'quantity' => $dto->quantity,
                'unit_id' => $dto->unit_id,
                'currency_id' => $dto->currency_id,
                'currency_rate' => $currency->in_local_currency,
                'original_unit_price' => $dto->original_unit_price,
                'unit_price' => $dto->original_unit_price * $currency->in_local_currency,
                'supplier' => $dto->supplier,
                'image' => $imageUrl,
            ]);
        } catch (Exception $e) {
            Log::error('Failed to store warehouse item', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Update an existing warehouse item
     * 
     * @var Currency $currency 
     * @throws ModelNotFoundException|Exception
     */
    public function update(WarehouseItemDTO $dto, WarehouseItem $warehouseItem): WarehouseItem
    {
        try {
            $currency = $this->getCurrency($dto->currency_id);
            $updateData = [
                'warehouse_id' => $dto->warehouse_id,
                'title' => $dto->title,
                'quantity' => $dto->quantity,
                'unit_id' => $dto->unit_id,
                'currency_id' => $dto->currency_id,
                'currency_rate' => $currency->in_local_currency,
                'original_unit_price' => $dto->original_unit_price,
                'supplier' => $dto->supplier,
            ];

            if (!is_null($dto->image)) {
                $updateData['image'] = $this->handleImageUpload($dto->image);
            }

            if (
                $dto->currency_id !== $warehouseItem->currency_id ||
                $dto->original_unit_price !== $warehouseItem->original_unit_price
            ) {
                $updateData['unit_price'] = $dto->original_unit_price * $currency->in_local_currency;
            }

            $warehouseItem->update($updateData);

            return $warehouseItem;
        } catch (Exception $e) {
            Log::error('Failed to update warehouse item', [
                'error' => $e->getMessage(),
                'item_id' => $warehouseItem->id,
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
            return $this->imageUploadService->upload($image, 'warehouse-items');
        } catch (Exception $e) {
            Log::error('Image upload failed', ['error' => $e->getMessage()]);
            throw new Exception('Failed to upload image: ' . $e->getMessage());
        }
    }

    private function getCurrency(int $currencyId): Currency
    {
        try {
            $currency = $this->currencyCacheService->getCurrencyById($currencyId);

            if ($currency === null) {
                throw new ModelNotFoundException("Currency with ID {$currencyId} not found.");
            }

            return $currency;
        } catch (Exception $e) {
            Log::error('Failed to get currency', ['error' => $e->getMessage()]);
            throw new Exception('Failed to get currency: ' . $e->getMessage());
        }
    }
}
