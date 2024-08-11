<?php

namespace App\Filament\Resources\ProfileWisataResource\Pages;

use App\Filament\Resources\ProfileWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfileWisata extends EditRecord
{
    protected static string $resource = ProfileWisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
