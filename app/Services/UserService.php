<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use App\Contracts\ImageUploadServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function __construct(
        private readonly ImageUploadServiceInterface $imageUploadService,
    ) {}

    /**
     * Create a new user
     *
     * @throws Exception
     */
    public function store(UserDTO $dto): User
    {
        try {
            $imageUrl = $this->handleImageUpload($dto->avatar);

            return User::create([
                'role_id' => $dto->role_id,
                'company_id' => $dto->company_id,
                'name' => $dto->name,
                'phone' => $dto->phone,
                'salary' => $dto->salary,
                'password' => $dto->password,
                'avatar' => $imageUrl,
            ]);
        } catch (Exception $e) {
            Log::error('Failed to store user', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Update an existing user
     *
     * @throws ModelNotFoundException|Exception
     */
    public function update(UserDTO $dto, User $user): User
    {
        try {
            $updateData = [
                'role_id' => $dto->role_id,
                'company_id' => $dto->company_id,
                'name' => $dto->name,
                'phone' => $dto->phone,
                'salary' => $dto->salary,
                'password' => $dto->password,
                'avatar' => $dto->avatar,
            ];

            if (!is_null($dto->avatar)) {
                $updateData['avatar'] = $this->handleImageUpload($dto->avatar);
            }

            $user->update(array_filter($updateData));

            return $user;
        } catch (Exception $e) {
            Log::error('Failed to update user', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Handle image upload with error handling
     */
    private function handleImageUpload(?UploadedFile $image = null): ?string
    {
        if ($image === null) {
            return null;
        }

        try {
            return $this->imageUploadService->upload($image, 'user-avatars');
        } catch (Exception $e) {
            Log::error('Image upload failed', ['error' => $e->getMessage()]);
            throw new Exception('Failed to upload image: ' . $e->getMessage());
        }
    }
}
