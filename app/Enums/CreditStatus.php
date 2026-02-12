<?php

namespace App\Enums;

enum CreditStatus: string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case PARTIALLY_PAID = 'partially_paid';
    case PAID = 'paid';
    case OVERDUE = 'overdue';
}
