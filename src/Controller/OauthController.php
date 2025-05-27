<?php

namespace App\Controller;

use App\Dto\Request\OauthRequest;
use App\Dto\Response\OauthHandledSuccessfullyResponse;
use App\Service\Oauth\OauthServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

class OauthController extends AbstractController
{
    public function __construct(
        private readonly OauthServiceInterface $oauthService,
        private readonly LoggerInterface $logger
    ){}

    #[Route('/oauth', name: 'oauth', methods: ['GET'])]
    public function oauth(#[MapQueryString] OauthRequest $request): Response
    {
        $this->logger->info('Получены данные: ' . json_encode($request));
        $this->oauthService->authorize($request);

        $response = new OauthHandledSuccessfullyResponse();
        return $this->json($response, $response->code);
    }
}
