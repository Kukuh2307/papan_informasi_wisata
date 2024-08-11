<?php

namespace App\Filament\Resources\FasilitasResource\Pages;

use App\Filament\Resources\FasilitasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Fasilitas;

class ListFasilitas extends ListRecords
{
    protected static string $resource = FasilitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableRedirect(): ?string
    {
        // Redirect to the edit page of the first record if it exists, otherwise to the create page.
        $firstRecord = Fasilitas::first();
        if ($firstRecord) {
            return static::getResource()::getUrl('edit', ['record' => $firstRecord->id]);
        }

        return static::getResource()::getUrl('create');
    }
}
