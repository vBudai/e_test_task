<?php

namespace App\Dto\Request;

class WebhookRequest
{
    public function __construct(
        public array $account,
        public array $contacts = [],
        public array $leads = [],
    ){}
}
