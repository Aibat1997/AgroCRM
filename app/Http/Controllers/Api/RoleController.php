<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRoleId;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserRole\UserRoleCollection;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = UserRole::paginate(15);
        return new UserRoleCollection($roles);
    }

    public function registrationRoles(Request $request)
    {
        $roles = UserRole::whereNotIn('id', [UserRoleId::OWNER->value, UserRoleId::ADMIN->value])->paginate(15);
        return new UserRoleCollection($roles);
    }
}
