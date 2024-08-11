<?php

namespace App\Filament\Resources\ProfileWisataResource\Pages;

use App\Filament\Resources\ProfileWisataResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class ListProfileWisatas extends ListRecords
{
    protected static string $resource = ProfileWisataResource::class;

    public function mount(): void
    {
        $firstRecord = $this->getModel()::first();

        if ($firstRecord) {
            $this->redirect(ProfileWisataResource::getUrl('edit', ['record' => $firstRecord->id]));
        } else {
            $this->redirect(ProfileWisataResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('create')
                ->url(fn(): string => ProfileWisataResource::getUrl('create'))
        ];
    }
}
