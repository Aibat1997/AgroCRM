<?php

namespace App\Enums;

enum UserRoleId: int
{
    case ADMIN = 1;
    case LABORATORIAN = 2;
    case WEIGHER = 3;
    case ECONOMIST = 4;
    case ACCOUNTANT = 5;
}
