<?php

namespace App\DTO;

class LaboratoryCalculationDTO
{
    public ?int $physical_weight = null;
    public ?int $estimated_weight = null;
    public ?int $conditioned_weight = null;

    public function __construct(
        public readonly string $variety,
        public readonly string $picking_type,
        public readonly int $pile,
        public readonly int $batch,
        public readonly int $gross_weight,
        public readonly int $container_weight,
        public readonly float $actual_contamination,
        public readonly float $actual_humidity,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            variety: (string)$data['variety'],
            picking_type: (string)$data['picking_type'],
            pile: (int)$data['pile'],
            batch: (int)$data['batch'],
            gross_weight: (int)$data['gross_weight'],
            container_weight: (int)$data['container_weight'],
            actual_contamination: (float)$data['actual_contamination'],
            actual_humidity: (float)$data['actual_humidity'],
        );
    }

    public function toArray(): array
    {
        return [
            'variety' => $this->variety,
            'picking_type' => $this->picking_type,
            'pile' => $this->pile,
            'batch' => $this->batch,
            'gross_weight' => $this->gross_weight,
            'container_weight' => $this->container_weight,
            'actual_contamination' => $this->actual_contamination,
            'actual_humidity' => $this->actual_humidity,
            'physical_weight' => $this->physical_weight,
            'estimated_weight' => $this->estimated_weight,
            'conditioned_weight' => $this->conditioned_weight,
        ];
    }
}
