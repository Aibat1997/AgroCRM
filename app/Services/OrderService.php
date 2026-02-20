<?php

namespace App\Services;

use App\DTO\ConfirmSaleOrderDTO;
use App\Enums\OrderStatus;
use App\Exceptions\InvalidOrderException;
use App\Helpers\ClientDataHelper;
use App\Models\Order;
use App\Models\User;
use App\Services\Transaction\SaleHandler;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function getOrCreateActiveOrder(User $author, bool $isPurchase, int $companyId = null): Order
    {
        return $author->activeOrder()->firstOrCreate([
            'company_id' => $companyId ?? $author->company_id,
            'is_purchase' => $isPurchase,
        ]);
    }

    public function confirmSaleOrder(ConfirmSaleOrderDTO $dto, Order $order): Order
    {
        if ($order->status !== OrderStatus::PENDING && $order->is_purchase === false) {
            throw InvalidOrderException::notConfirmable();
        }

        $saleHandler = app(SaleHandler::class);
        $clientService = app(ClientService::class);
        $client = null;

        if (ClientDataHelper::hasRequiredClientData($dto)) {
            $client = $clientService->findOrCreateByIdentifier($dto);
        }

        DB::transaction(function () use ($order, $dto, $client, $saleHandler) {
            $order->update([
                'payment_method_id' => $dto->payment_method_id,
                'client_id' => $client?->id,
                'status' => OrderStatus::COMPLETED,
            ]);

            foreach ($order->products as $orderProduct) {
                $warehouseItem = $orderProduct->warehouseItem;
                $warehouseItem->decrement('quantity', $orderProduct->quantity);
            }

            $saleHandler->handle($order);
        });

        return $order;
    }
}
