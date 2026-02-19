<?php

namespace App\Enums;

enum PaymentMethodId: int
{
    case IN_CASH = 1;
    case BANK_CARD = 2;
    case BANK_TRANSFER = 3;
    case ON_DEBT = 4;
    case PAYMENT_INVOICE = 5;
}
