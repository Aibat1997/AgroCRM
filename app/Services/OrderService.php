<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;

class OrderService
{
    public function getOrCreateActiveOrder(User $author, bool $isPurchase, int $companyId = null): Order
    {
        return $author->activeOrder()->firstOrCreate([
            'company_id' => $companyId ?? $author->company_id,
            'is_purchase' => $isPurchase,
        ]);
    }
}
