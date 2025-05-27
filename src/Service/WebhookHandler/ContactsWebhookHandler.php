<?php

namespace App\Service\WebhookHandler;

use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Exceptions\AmoCRMMissedTokenException;
use AmoCRM\Exceptions\AmoCRMoAuthApiException;
use AmoCRM\Exceptions\InvalidArgumentException;
use App\Dto\Request\WebhookRequest;

class ContactsWebhookHandler extends BaseWebhookHandler implements WebhookHandlerInterface
{
    /**
     * @throws AmoCRMApiException
     */
    public function handleCreate(int $id): void
    {
        $contact = $this->apiClient->contacts()->getOne($id);
        $user = $this->apiClient->users()->getOne($contact->getResponsibleUserId());

        $note = $this->noteFactory->getCreatingNoteForCard($contact, $user);
        $this->apiClient->notes('contacts')->addOne($note);
    }

    /**
     * @throws AmoCRMApiException
     */
    public function handleUpdate(WebhookRequest $request): void
    {
        $contact = $request->contacts['update'][0];

        $note = $this->noteFactory->getUpdatingNoteForCard($contact);
        $this->apiClient->notes('contacts')->addOne($note);
    }
}
