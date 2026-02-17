<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class EmptyResource extends BaseResource
{
    public function __construct()
    {
        parent::__construct([]);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [];
    }

    /**
     * Static helper for quick responses
     */
    public static function success(): self
    {
        return new self();
    }
}
