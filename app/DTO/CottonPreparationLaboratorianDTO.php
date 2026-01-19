<?php

namespace App\DTO;

class CottonPreparationLaboratorianDTO
{
    public function __construct(
        public readonly string $cotton_receiving_point,
        public readonly string $selective_variety,
        public readonly string $variety,
        public readonly string $pile,
        public readonly string $batch,
        public readonly string $picking_type,
        public readonly float $contamination,
        public readonly float $humidity,
        public readonly string $laboratory_date,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            cotton_receiving_point: (string)$data['cotton_receiving_point'],
            selective_variety: (string)$data['selective_variety'],
            variety: (string)$data['variety'],
            pile: (string)$data['pile'],
            batch: (string)$data['batch'],
            picking_type: (string)$data['picking_type'],
            contamination: (float)$data['contamination'],
            humidity: (float)$data['humidity'],
            laboratory_date: (string)$data['laboratory_date'],
        );
    }

    public function toArray(): array
    {
        return [
            'cotton_receiving_point' => $this->cotton_receiving_point,
            'selective_variety' => $this->selective_variety,
            'variety' => $this->variety,
            'pile' => $this->pile,
            'batch' => $this->batch,
            'picking_type' => $this->picking_type,
            'contamination' => $this->contamination,
            'humidity' => $this->humidity,
            'laboratory_date' => $this->laboratory_date,
        ];
    }
}
