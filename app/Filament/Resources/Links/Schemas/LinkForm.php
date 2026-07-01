<?php

namespace App\Filament\Resources\Links\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('original_link')
                    ->label('Оригинальная ссылка')
                    ->required()
                    ->url()
                    ->maxLength(2048)
                    ->placeholder('https://example.ru/test')
            ]);
    }
}
