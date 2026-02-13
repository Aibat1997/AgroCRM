<?php

namespace App\DTO;

use App\Contracts\ClientDataProviderInterface;
use Illuminate\Http\UploadedFile;

class RealEstateRentalDTO implements ClientDataProviderInterface
{
    public function __construct(
        public readonly int $real_estate_id,
        public readonly string $tenant_name,
        public readonly string $tenant_phone,
        public readonly string $tenant_identifier,
        public readonly string $from_date,
        public readonly int $payment_frequency_id,
        public readonly int $amount,
        public readonly ?string $to_date = null,
        public readonly ?float $area = null,
        public readonly ?int $unit_id = null,
        public readonly ?UploadedFile $contract = null,
        public readonly ?string $note = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            real_estate_id: (int) $data['real_estate_id'],
            tenant_name: (string) $data['tenant_name'],
            tenant_phone: (string) $data['tenant_phone'],
            tenant_identifier: (string) $data['tenant_identifier'],
            from_date: (string) $data['from_date'],
            to_date: isset($data['to_date']) ? (string) $data['to_date'] : null,
            payment_frequency_id: (int) $data['payment_frequency_id'],
            amount: (int) $data['amount'],
            area: isset($data['area']) ? (float) $data['area'] : null,
            unit_id: isset($data['unit_id']) ? (int) $data['unit_id'] : null,
            contract: $data['contract'] ?? null,
            note: isset($data['note']) ? (string) $data['note'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'real_estate_id' => $this->real_estate_id,
            'tenant_name' => $this->tenant_name,
            'tenant_phone' => $this->tenant_phone,
            'tenant_identifier' => $this->tenant_identifier,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'payment_frequency_id' => $this->payment_frequency_id,
            'amount' => $this->amount,
            'area' => $this->area,
            'unit_id' => $this->unit_id,
            'contract' => $this->contract,
            'note' => $this->note,
        ];
    }

    public function getClientData(): array
    {
        return [
            'name' => $this->tenant_name,
            'identifier' => $this->tenant_identifier,
            'phone' => $this->tenant_phone,
        ];
    }
}
