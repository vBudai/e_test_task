<?php

namespace App\Dto\Request;

use Symfony\Component\Validator\Constraints as Assert;

class OauthRequest
{
    public function __construct(
        #[Assert\NotBlank]
        public string $code,
    ){}
}
