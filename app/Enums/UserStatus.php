<?php

namespace App\Enums;

enum UserStatus: string
{
    case CONFIRMED = 'confirmed';
    case CANCELED = 'canceled';
    case PENDING = 'pending';
}
