<?php

namespace App\Filament\Resources\DailyJournalResource\Pages;

use App\Filament\Resources\DailyJournalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDailyJournals extends ManageRecords
{
    protected static string $resource = DailyJournalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
