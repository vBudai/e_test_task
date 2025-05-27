<?php

namespace App\Service\Note;

use AmoCRM\Models\ContactModel;
use AmoCRM\Models\LeadModel;
use AmoCRM\Models\UserModel;
use App\Dto\Request\WebhookRequest;

interface NoteTextBuilderInterface
{
    public function buildCreatingNoteText(LeadModel|ContactModel $card, UserModel $user): string;
    public function buildUpdatingNoteText(array $card): string;
}
