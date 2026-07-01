<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinkResource;
use App\Services\ShortLinkService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateLink extends CreateRecord
{
    protected static string $resource = LinkResource::class;
    protected static ?string $title = 'Создать ссылку';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $userId = Auth::id();
        $service = app(ShortLinkService::class);
        $data['user_id'] = $userId;
        $data['short_link'] = $service->getShortLink($userId);
        $exists = $service->alreadyExists($userId, $data['original_link']);
        if ($exists) {
            \Filament\Notifications\Notification::make()
                ->title('Ссылка уже существует')
                ->danger()
                ->send();

            $this->halt();
        }
        return $data;
    }

}
