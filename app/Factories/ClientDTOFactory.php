<?php

namespace App\Factories;

use App\DTO\ClientDTO;
use App\DTO\ConfirmSaleOrderDTO;
use App\DTO\CottonPreparationWeigherDTO;
use App\DTO\Debt\StoreDebtDTO;
use App\DTO\RealEstateRentalDTO;

class ClientDTOFactory
{
    public static function fromStoreDebt(StoreDebtDTO $dto): ClientDTO
    {
        return new ClientDTO(
            name: $dto->client_name,
            identifier: $dto->client_identifier,
            phone: $dto->client_phone
        );
    }

    public static function fromConfirmSaleOrder(ConfirmSaleOrderDTO $dto): ?ClientDTO
    {
        if (
            is_null($dto->client_name) &&
            is_null($dto->client_identifier)
        ) {
            return null;
        }

        return new ClientDTO(
            name: $dto->client_name,
            identifier: $dto->client_identifier,
            phone: $dto->client_phone
        );
    }

    public static function fromCottonPreparationWeigher(CottonPreparationWeigherDTO $dto): ClientDTO
    {
        return new ClientDTO(
            name: $dto->supplier_name,
            identifier: $dto->supplier_identifier,
            phone: $dto->supplier_phone
        );
    }

    public static function fromRealEstateRental(RealEstateRentalDTO $dto): ClientDTO
    {
        return new ClientDTO(
            name: $dto->tenant_name,
            identifier: $dto->tenant_identifier,
            phone: $dto->tenant_phone
        );
    }
}
