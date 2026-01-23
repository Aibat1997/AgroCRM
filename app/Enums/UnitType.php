<?php

namespace App\Enums;

enum UnitType: string
{
    case COUNT = 'count';
    case AREA = 'area';
    case WEIGHT = 'weight';
    case VOLUME = 'volume';
    case LENGTH = 'length';
}
