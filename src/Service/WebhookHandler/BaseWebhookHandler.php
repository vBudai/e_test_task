<?php

namespace App\Service\WebhookHandler;

use AmoCRM\Client\AmoCRMApiClient;
use App\Service\Note\NoteFactoryInterface;
use App\Service\Oauth\OauthService;
use App\Service\Oauth\OauthTokenStorage;
use Closure;

class BaseWebhookHandler
{
    public function __construct(
        protected AmoCRMApiClient $apiClient,
        protected NoteFactoryInterface $noteFactory,

        private OauthService $oauthService,
    ){
        $tokenStorage = new OauthTokenStorage();

        $this->apiClient
            ->setAccountBaseDomain($_ENV['CLIENT_DOMAIN'])
            ->setAccessToken($tokenStorage->getToken())
            ->setRefreshAccessTokenCallback($this->oauthService->getRefreshCallable());
    }
}
