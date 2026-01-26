<?php

namespace App\DTO;

use App\Enums\UserTaskStatus;

class UserTaskDTO
{
    const DEFAULT_STATUS = UserTaskStatus::IN_PROGRESS->value;

    public function __construct(
        public readonly string $title,
        public readonly ?string $description = null,
        public readonly string $start_date,
        public readonly string $finish_date,
        public readonly ?int $user_id = null,
        public readonly string $status = self::DEFAULT_STATUS,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: (string)$data['title'],
            description: isset($data['description']) ? (string)$data['description'] : null,
            start_date: (string)$data['start_date'],
            finish_date: (string)$data['finish_date'],
            user_id: isset($data['user_id']) ? (int)$data['user_id'] : null,
            status: isset($data['status']) ? (string)$data['status'] : self::DEFAULT_STATUS,
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
            'status' => $this->status,
        ];
    }
}
