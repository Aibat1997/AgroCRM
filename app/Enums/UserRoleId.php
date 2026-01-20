<?php

namespace App\Enums;

enum UserRoleId: int
{
    case OWNER = 1;
    case ADMIN = 2;
    case LABORATORIAN = 3;
    case WEIGHER = 4;
    case ECONOMIST = 5;
    case ACCOUNTANT = 6;
    case MANAGER = 7;
}
