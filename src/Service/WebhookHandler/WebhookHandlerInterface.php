<?php

namespace App\Service\WebhookHandler;

use App\Dto\Request\WebhookRequest;

interface WebhookHandlerInterface
{
    public function handleCreate(int $id): void;
    public function handleUpdate(WebhookRequest $request): void;
}
