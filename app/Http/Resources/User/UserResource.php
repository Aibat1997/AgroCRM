<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\UserRole\UserRoleResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\User
 */
class UserResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'avatar' => $this->avatar,
            'salary' => $this->salary,
            'role' => new UserRoleResource($this->role),
            'company' => new CompanyResource($this->company),
        ];
    }
}
