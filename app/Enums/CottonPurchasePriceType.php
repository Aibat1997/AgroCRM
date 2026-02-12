<?php

namespace App\Enums;

enum CottonPurchasePriceType: string
{
    case COTTON_PRICE = 'cotton_price';
    case COTTON_SEED_PRICE = 'cotton_seed_price';
    case PREPAYMENT_PRICE = 'prepayment_price';
}
