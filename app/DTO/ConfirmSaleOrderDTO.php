<?php

namespace App\DTO;

class ConfirmSaleOrderDTO
{
    public function __construct(
        public readonly int $payment_method_id,
        public readonly ?string $client_name,
        public readonly ?string $client_identifier,
        public readonly ?string $client_phone,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            payment_method_id: $data['payment_method_id'],
            client_name: isset($data['client_name']) ? (string) $data['client_name'] : null,
            client_identifier: isset($data['client_identifier']) ? (string) $data['client_identifier'] : null,
            client_phone: isset($data['client_phone']) ? (string) $data['client_phone'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'payment_method_id' => $this->payment_method_id,
            'client_name' => $this->client_name,
            'client_identifier' => $this->client_identifier,
            'client_phone' => $this->client_phone,
        ];
    }
}
