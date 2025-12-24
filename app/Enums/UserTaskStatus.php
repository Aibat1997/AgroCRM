<?php

namespace App\Enums;

enum UserTaskStatus: string
{
    case IN_PROGRESS = 'in_progress';
    case FINISHED = 'finished';
}
