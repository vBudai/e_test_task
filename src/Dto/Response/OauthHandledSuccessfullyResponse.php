<?php

namespace App\Dto\Response;

use App\Dto\Response\SuccessResponse;
use Symfony\Component\HttpFoundation\Response;

class OauthHandledSuccessfullyResponse extends SuccessResponse
{
    public function __construct()
    {
        parent::__construct(Response::HTTP_OK, ['message' => 'Token has been created and saved successfully.']);
    }
}
