<?php

namespace App\Policies;

use App\Enums\UserRoleId;
use App\Models\CottonPreparation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CottonPreparationPolicy
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
    public function view(User $user, CottonPreparation $cottonPreparation): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Only weighers can store weigher data.
     */
    public function storeWeigherData(User $user): bool
    {
        return $user->role_id == UserRoleId::WEIGHER->value;
    }

    /**
     * Only laboratorians can store laboratorian data.
     */
    public function storeLaboratorianData(User $user): bool
    {
        return $user->role_id == UserRoleId::LABORATORIAN->value;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CottonPreparation $cottonPreparation): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CottonPreparation $cottonPreparation): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CottonPreparation $cottonPreparation): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CottonPreparation $cottonPreparation): bool
    {
        return false;
    }
}
