<?php

namespace App\Controller;

use App\Dto\Request\WebhookRequest;
use App\Dto\Response\WebhookHandledSuccessfullyResponse;
use App\Service\WebhookHandler\WebhookHandlerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class ContactsWebhookController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ){}

    #[Route('/webhook/contacts/create', name: 'webhook_contacts_create', methods: ['POST'])]
    public function create(
        #[MapRequestPayload] WebhookRequest $request,
        #[Autowire(service: 'webhook.contacts.handler')]
        WebhookHandlerInterface $handler
    ): Response
    {
        $this->logger->info('Получены данные: ' . json_encode($request));
        $handler->handleCreate(
            $request->contacts['add'][0]['id']
        );

        $response = new WebhookHandledSuccessfullyResponse();
        return $this->json($response, $response->code);
    }

    #[Route('/webhook/contacts/update', name: 'webhook_contacts_update', methods: ['POST'])]
    public function update(
        #[MapRequestPayload] WebhookRequest $request,
        #[Autowire(service: 'webhook.contacts.handler')]
        WebhookHandlerInterface $handler
    ): Response
    {
        $this->logger->info('Получены данные: ' . json_encode($request));
        $handler->handleUpdate($request);

        $response = new WebhookHandledSuccessfullyResponse();
        return $this->json($response, $response->code);
    }
}
