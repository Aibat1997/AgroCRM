<?php

namespace App\DTO;

use App\Contracts\ClientDataProviderInterface;

class ConfirmSaleOrderDTO implements ClientDataProviderInterface
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
            client_name: $data['client_name'] ?? null,
            client_identifier: $data['client_identifier'] ?? null,
            client_phone: $data['client_phone'] ?? null,
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

    public function getClientData(): array
    {
        return [
            'name' => $this->client_name,
            'identifier' => $this->client_identifier,
            'phone' => $this->client_phone,
        ];
    }
}
