<?php

namespace App\Dto\Response;

use Symfony\Component\HttpFoundation\Response;

class ErrorResponse implements \JsonSerializable
{
    public function __construct(
        public int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
        public string $message = '',
    ){}

    public function jsonSerialize(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}
