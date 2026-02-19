<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;

class OrderService
{
    public function getOrCreateActiveOrder(User $author, int $companyId = null): Order
    {
        return $author->activeOrder()->firstOrCreate(['company_id' => $companyId ?? $author->company_id]);
    }
}
