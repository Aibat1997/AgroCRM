<?php

namespace App\DTO;

class CottonPreparationWeigherDTO
{
    public function __construct(
        public readonly int $invoice_number,
        public readonly string $transport,
        public readonly string $supplier,
        public readonly string $supplier_identifier,
        public readonly float $gross_weight,
        public readonly float $container_weight,
        public readonly string $weighing_date,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            invoice_number: (int)$data['invoice_number'],
            transport: (string)$data['transport'],
            supplier: (string)$data['supplier'],
            supplier_identifier: (string)$data['supplier_identifier'],
            gross_weight: (float)$data['gross_weight'],
            container_weight: (float)$data['container_weight'],
            weighing_date: (string)$data['weighing_date'],
        );
    }

    public function toArray(): array
    {
        return [
            'invoice_number' => $this->invoice_number,
            'transport' => $this->transport,
            'supplier' => $this->supplier,
            'supplier_identifier' => $this->supplier_identifier,
            'gross_weight' => $this->gross_weight,
            'container_weight' => $this->container_weight,
            'weighing_date' => $this->weighing_date,
        ];
    }
}
