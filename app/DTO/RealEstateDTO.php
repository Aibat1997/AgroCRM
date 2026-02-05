<?php

namespace App\DTO;

class RealEstateDTO
{
    public function __construct(
        public readonly int $real_estate_type_id,
        public readonly string $address,
        public readonly float $area,
        public readonly int $unit_id,
        public readonly ?string $cadastral_number = null,
        public readonly ?string $rented_from = null,
        public readonly ?string $rented_to = null,
        public readonly ?string $note = null,
        public readonly ?array $files = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            real_estate_type_id: (int) $data['real_estate_type_id'],
            address: (string) $data['address'],
            area: (float) $data['area'],
            unit_id: (int) $data['unit_id'],
            cadastral_number: isset($data['cadastral_number']) ? (string) $data['cadastral_number'] : null,
            rented_from: isset($data['rented_from']) ? (string) $data['rented_from'] : null,
            rented_to: isset($data['rented_to']) ? (string) $data['rented_to'] : null,
            note: isset($data['note']) ? (string) $data['note'] : null,
            files: isset($data['files']) ? (array) $data['files'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'real_estate_type_id' => $this->real_estate_type_id,
            'address' => $this->address,
            'area' => $this->area,
            'unit_id' => $this->unit_id,
            'cadastral_number' => $this->cadastral_number,
            'rented_from' => $this->rented_from,
            'rented_to' => $this->rented_to,
            'note' => $this->note,
            'files' => $this->files,
        ];
    }
}
