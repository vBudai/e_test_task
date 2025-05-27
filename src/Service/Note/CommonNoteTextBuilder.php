<?php

namespace App\Service\Note;

use AmoCRM\Models\ContactModel;
use AmoCRM\Models\LeadModel;
use AmoCRM\Models\UserModel;
use App\Dto\Request\WebhookRequest;

class CommonNoteTextBuilder implements NoteTextBuilderInterface
{
    public function buildCreatingNoteText(LeadModel|ContactModel $card, UserModel $user): string
    {
        return "Название: {$card->getName()}\n" .
            "Ответственный: {$user->getName()}\n".
            "Время создания: " . date('d.m.Y H:i', $card->getCreatedAt());
    }

    public function buildUpdatingNoteText(array $card): string
    {
        $text = "Время изменения: " . date('d.m.Y H:i', $card['updated_at']) . "\n";

        if(isset($card['price'])){
            $text .= "Цена: {$card['price']}\n";
        }
        if(isset($card['custom_fields'])){
            foreach ($card['custom_fields'] as $field) {
                $text .= "{$field['name']}: {$field['values'][0]['value']}\n";
            }
        }

        return $text;
    }
}
