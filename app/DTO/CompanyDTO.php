<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

class CompanyDTO
{
    public function __construct(
        public readonly ?int $parent_id = null,
        public readonly string $name,
        public readonly ?UploadedFile $logo = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            parent_id: isset($data['parent_id']) ? (int) $data['parent_id'] : null,
            name: (string) $data['name'],
            logo: $data['logo'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'parent_id' => $this->parent_id,
            'name' => $this->name,
            'logo' => $this->logo,
        ];
    }
}
