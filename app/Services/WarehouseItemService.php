<?php

namespace App\Services;

use App\DTO\WarehouseItemDTO;
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
    ) {}

    /**
     * Create a new warehouse item
     * 
     * @throws Exception
     */
    public function store(WarehouseItemDTO $dto): WarehouseItem
    {
        try {
            $imageUrl = $this->handleImageUpload($dto->image);

            return WarehouseItem::create([
                'warehouse_id' => $dto->warehouse_id,
                'title' => $dto->title,
                'quantity' => $dto->quantity,
                'unit_id' => $dto->unit_id,
                'min_sell_price' => $dto->min_sell_price,
                'article_number' => $dto->article_number,
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
     * @throws ModelNotFoundException|Exception
     */
    public function update(WarehouseItemDTO $dto, WarehouseItem $warehouseItem): WarehouseItem
    {
        try {
            $updateData = [
                'warehouse_id' => $dto->warehouse_id,
                'title' => $dto->title,
                'quantity' => $dto->quantity,
                'unit_id' => $dto->unit_id,
                'min_sell_price' => $dto->min_sell_price,
                'article_number' => $dto->article_number,
            ];

            if (!is_null($dto->image)) {
                $updateData['image'] = $this->handleImageUpload($dto->image);
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

    public function findOrCreateByArticleNumber(WarehouseItemDTO $dto): WarehouseItem
    {
        $warehouseItem = WarehouseItem::where('article_number', $dto->article_number)->first();

        if (!$warehouseItem) {
            $warehouseItem = $this->store($dto);
        }

        return $warehouseItem;
    }
}
