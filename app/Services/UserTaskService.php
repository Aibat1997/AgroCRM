<?php

namespace App\Services;

use App\DTO\UserTaskDTO;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class UserTaskService
{
    public static function store(UserTaskDTO $dto): UserTask
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $userTask = UserTask::create([
            ...$dto->toArray(),
            'author_id' => $user->id,
            'user_id' => $user->id,
        ]);

        return $userTask;
    }

    public static function update(UserTaskDTO $dto, UserTask $userTask): UserTask
    {
        $userTask->update($dto->toArray());
        return $userTask;
    }
}
