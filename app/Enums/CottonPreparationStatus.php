<?php

namespace App\Enums;

enum CottonPreparationStatus: string
{
    case IN_LABORATORY = 'in_laboratory';
    case ECONOMIST_DECISION = 'economist_decision';
    case ACCOUNTANT_DECISION = 'accountant_decision';
    case PREPARED = 'prepared';
}
