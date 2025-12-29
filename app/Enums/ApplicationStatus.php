<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';
}
