<?php

namespace App\Service\Oauth;

use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;

class OauthTokenStorage
{
    private readonly string $filepath;

    public function __construct()
    {
        $this->filepath = __DIR__ . "/../../../config/amocrm_access_token.json";
    }

    public function getToken(): AccessToken | AccessTokenInterface
    {
        $accessToken = json_decode(file_get_contents($this->filepath), true);
        return new AccessToken($accessToken);
    }

    public function saveToken(AccessTokenInterface|array $token): void
    {
        file_put_contents($this->filepath, json_encode($token, JSON_PRETTY_PRINT));
    }
}
