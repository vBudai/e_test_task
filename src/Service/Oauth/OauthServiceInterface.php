<?php

namespace App\Service\Oauth;

use App\Dto\Request\OauthRequest;
use League\OAuth2\Client\Token\AccessTokenInterface;

interface OauthServiceInterface
{
    public function authorize(OauthRequest $request): AccessTokenInterface;

    public function refresh(): AccessTokenInterface;
    public function getRefreshCallable(): callable;
}
