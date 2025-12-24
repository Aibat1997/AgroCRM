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
        $dto->author_id = $user->id;
        $dto->user_id = $user->id;

        $userTask = UserTask::create($dto->toArray());

        return $userTask;
    }

    public static function update(UserTaskDTO $dto, UserTask $userTask): UserTask
    {
        $dto->author_id = $userTask->author_id;
        $dto->user_id = $userTask->user_id;

        $userTask->update($dto->toArray());

        return $userTask;
    }
}
