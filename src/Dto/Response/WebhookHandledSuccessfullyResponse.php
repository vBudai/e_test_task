<?php

namespace App\Dto\Response;

use Symfony\Component\HttpFoundation\Response;

class WebhookHandledSuccessfullyResponse extends SuccessResponse
{
    public function __construct()
    {
        parent::__construct(Response::HTTP_OK, ['message' => 'Note created successfully.']);
    }
}
