<?php

namespace App\Services;

use App\DTO\UserTaskDTO;
use App\Models\UserTask;

class UserTaskService
{
    public function store(UserTaskDTO $dto, int $authorId): UserTask
    {
        return UserTask::create([
            'author_id' => $authorId,
            'executor_id' => $dto->executor_id ?? $authorId,
            'title' => $dto->title,
            'description' => $dto->description,
            'start_date' => $dto->start_date,
            'finish_date' => $dto->finish_date,
            'status' => $dto->status,
        ]);
    }

    public function update(UserTaskDTO $dto, UserTask $userTask): UserTask
    {
        $updatedData = array_filter([
            'executor_id' => $dto->executor_id,
            'title' => $dto->title,
            'description' => $dto->description,
            'start_date' => $dto->start_date,
            'finish_date' => $dto->finish_date,
            'status' => $dto->status,
        ]);

        $userTask->update($updatedData);

        return $userTask;
    }
}
