<?php

namespace App\Service\Note;

use AmoCRM\Models\ContactModel;
use AmoCRM\Models\LeadModel;
use AmoCRM\Models\NoteType\CommonNote;
use AmoCRM\Models\UserModel;

interface NoteFactoryInterface
{
    public function getCreatingNoteForCard(LeadModel|ContactModel $card, UserModel $user): CommonNote;
    public function getUpdatingNoteForCard(array $card): CommonNote;
}
