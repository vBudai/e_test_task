<?php

namespace App\Dto\Response;

use Symfony\Component\HttpFoundation\Response;

class SuccessResponse implements \JsonSerializable
{
    public function __construct(
        public int $code = Response::HTTP_OK,
        public mixed $data = [],
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'data' => $this->data
        ];
    }
}
