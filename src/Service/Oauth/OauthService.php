<?php

namespace App\Service\Oauth;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Exceptions\AmoCRMoAuthApiException;
use App\Dto\Request\OauthRequest;
use League\OAuth2\Client\Token\AccessTokenInterface;

class OauthService implements OauthServiceInterface
{
    public function __construct(
        private AmoCRMApiClient $apiClient,
        private OauthTokenStorage $storage,
    ){
        $this->apiClient->setAccountBaseDomain($_ENV['CLIENT_DOMAIN']);
    }

    /**
     * @throws AmoCRMoAuthApiException
     */
    public function authorize(OauthRequest $request): AccessTokenInterface
    {
        $accessToken = $this->apiClient->getOAuthClient()->getAccessTokenByCode($request->code);
        $this->storage->saveToken($accessToken);
        return $accessToken;
    }

    /**
     * @throws AmoCRMoAuthApiException
     */
    public function refresh(): AccessTokenInterface
    {
        $oldAccessToken = $this->storage->getToken();
        $newAccessToken = $this->apiClient->getOAuthClient()->getAccessTokenByRefreshToken($oldAccessToken);
        $this->storage->saveToken($newAccessToken);
        return $newAccessToken;
    }

    public function getRefreshCallable(): callable
    {
        return [$this, 'refresh'];
    }
}
