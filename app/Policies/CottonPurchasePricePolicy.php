<?php

namespace App\Policies;

use App\Enums\UserRoleId;
use App\Models\CottonPurchasePrice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CottonPurchasePricePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CottonPurchasePrice $cottonPurchasePrice): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role_id, [UserRoleId::ADMIN->value, UserRoleId::OWNER->value], true);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CottonPurchasePrice $cottonPurchasePrice): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CottonPurchasePrice $cottonPurchasePrice): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CottonPurchasePrice $cottonPurchasePrice): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CottonPurchasePrice $cottonPurchasePrice): bool
    {
        return false;
    }
}
