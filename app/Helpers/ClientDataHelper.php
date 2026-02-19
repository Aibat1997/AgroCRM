<?php

namespace App\Helpers;

use App\Contracts\ClientDataProviderInterface;

abstract class ClientDataHelper
{
    public static function hasRequiredClientData(ClientDataProviderInterface $provider): bool
    {
        $values = array_filter($provider->getClientData(), fn($value) => !is_null($value) && $value !== '');
        return !empty($values);
    }
}
