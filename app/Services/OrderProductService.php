<?php

namespace App\Services;

use App\DTO\OrderProductDTO;
use App\DTO\SaleProductDTO;
use App\Exceptions\InvalidOrderProductException;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\WarehouseItem;
use Illuminate\Support\Facades\DB;

class OrderProductService
{
    public function __construct(
        private readonly CurrencyCacheService $currencyCacheService
    ) {}

    public function addProductsToOrder(SaleProductDTO $dto, Order $order): void
    {
        $totalAmount = 0;
        $orderProducts = [];
        $warehouseItemIds = array_map(fn(OrderProductDTO $item) => $item->warehouse_item_id, $dto->orderProducts);
        $warehouseItems = WarehouseItem::whereIn('id', $warehouseItemIds)->toBase()->get(['id', 'title', 'quantity', 'min_sell_price'])->keyBy('id');

        /** @var OrderProductDTO $orderProduct */
        foreach ($dto->orderProducts as $orderProduct) {
            $warehouseItem = $warehouseItems->get($orderProduct->warehouse_item_id);
            $currency = $this->currencyCacheService->getCurrencyById($orderProduct->currency_id);
            $price = $orderProduct->currency_price * $currency->in_local_currency;

            if ($price > $warehouseItem->min_sell_price) {
                throw InvalidOrderProductException::invalidPrice($warehouseItem->title, $price);
            }
            if ($orderProduct->quantity > $warehouseItem->quantity) {
                throw InvalidOrderProductException::invalidQuantity($orderProduct->quantity, $warehouseItem->quantity, $warehouseItem->title);
            }

            $orderProducts[] = [
                'order_id' => $order->id,
                'warehouse_item_id' => $orderProduct->warehouse_item_id,
                'currency_id' => $orderProduct->currency_id,
                'currency_rate' => $currency->in_local_currency,
                'currency_price' => $orderProduct->currency_price,
                'price' => $price,
                'quantity' => $orderProduct->quantity,
            ];

            $totalAmount += $price * $orderProduct->quantity;
        }

        DB::transaction(function () use ($orderProducts, $order, $totalAmount) {
            OrderProduct::upsert($orderProducts, ['order_id', 'warehouse_item_id'], ['currency_id', 'currency_rate', 'currency_price', 'price', 'quantity']);
            $order->update(['total_amount' => $totalAmount]);
        });
    }
}
