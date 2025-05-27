<?php

namespace App\Service\WebhookHandler;

use AmoCRM\Exceptions\AmoCRMApiException;
use App\Dto\Request\WebhookRequest;

class LeadsWebhookHandler extends BaseWebhookHandler implements WebhookHandlerInterface
{
    /**
     * @throws AmoCRMApiException
     */
    public function handleCreate(int $id): void
    {
        $lead = $this->apiClient->leads()->getOne($id);
        $user = $this->apiClient->users()->getOne($lead->getResponsibleUserId());

        $note = $this->noteFactory->getCreatingNoteForCard($lead, $user);
        $this->apiClient->notes('leads')->addOne($note);
    }

    /**
     * @throws AmoCRMApiException
     */
    public function handleUpdate(WebhookRequest $request): void
    {
        $lead = $request->leads['update'][0];

        $note = $this->noteFactory->getUpdatingNoteForCard($lead);
        $this->apiClient->notes('leads')->addOne($note);
    }
}
