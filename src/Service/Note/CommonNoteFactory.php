<?php

namespace App\Service\Note;

use AmoCRM\Models\ContactModel;
use AmoCRM\Models\LeadModel;
use AmoCRM\Models\NoteType\CommonNote;
use AmoCRM\Models\UserModel;
use App\Dto\Request\WebhookRequest;

class CommonNoteFactory implements NoteFactoryInterface
{
    public function __construct(
        private NoteTextBuilderInterface $textBuilder,
    ){}

    public function getCreatingNoteForCard(LeadModel|ContactModel $card, UserModel $user): CommonNote
    {
        return $this->buildNote(
            $card->getId(),
            $this->textBuilder->buildCreatingNoteText($card, $user),
        );
    }

    public function getUpdatingNoteForCard(array $card): CommonNote
    {
        return $this->buildNote(
            $card['id'],
            $this->textBuilder->buildUpdatingNoteText($card)
        );
    }

    private function buildNote(int $entityId, string $text): CommonNote
    {
        $note = new CommonNote();
        $note
            ->setEntityId($entityId)
            ->setText($text);
        return $note;
    }
}
