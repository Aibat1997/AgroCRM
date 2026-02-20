<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class InvalidOrderException extends Exception
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

    public static function notConfirmable(): self
    {
        return new self("Order can't be confirmed. Status is not pending", 404);
    }
}
