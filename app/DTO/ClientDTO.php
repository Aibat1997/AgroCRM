<?php

namespace App\DTO;

class ClientDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $identifier,
        public readonly ?string $phone = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: (string) $data['name'],
            identifier: (string) $data['identifier'],
            phone: isset($data['phone']) ? (string) $data['phone'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'identifier' => $this->identifier,
            'phone' => $this->phone,
        ];
    }
}
