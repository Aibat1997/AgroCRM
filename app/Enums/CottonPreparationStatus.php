<?php

namespace App\Enums;

enum CottonPreparationStatus: string
{
    case AWAITING_LABORATORIAN = 'awaiting_laboratorian';
    case AWAITING_ECONOMIST = 'awaiting_economist';
    case AWAITING_ACCOUNTANT = 'awaiting_accountant';
    case PREPARED = 'prepared';
}
