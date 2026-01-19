<?php

namespace App\DTO;

use App\Enums\UserTaskStatus;

class UserTaskDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $start_date,
        public readonly string $finish_date,
        public readonly string $status,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: (string)$data['title'],
            description: (string)$data['description'],
            start_date: (string)$data['start_date'],
            finish_date: (string)$data['finish_date'],
            status: (string)($data['status'] ?? UserTaskStatus::IN_PROGRESS->value),
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
