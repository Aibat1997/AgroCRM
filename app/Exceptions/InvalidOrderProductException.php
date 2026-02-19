<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class InvalidOrderProductException extends Exception
{
    public function __construct(string $message = '', protected int $statusCode = 422)
    {
        parent::__construct($message);
    }

    /**
     * Report the exception. (Log it, send it to an external service, etc.)
     */
    public function report(): void
    {
        // ...
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse|bool
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $this->getMessage(),
            ], $this->statusCode);
        }

        return false;
    }

    public static function invalidQuantity(int $needQuantity, int $availableQuantity, string $productName): self
    {
        return new self("Ваш запрос на {$needQuantity} единиц превышает текущий остаток. В наличии доступно {$availableQuantity} шт. товара: {$productName}", 422);
    }

    public static function invalidPrice(string $productName, float $price): self
    {
        return new self("Недопустимая цена {$price} для продукта: {$productName}", 422);
    }
}
