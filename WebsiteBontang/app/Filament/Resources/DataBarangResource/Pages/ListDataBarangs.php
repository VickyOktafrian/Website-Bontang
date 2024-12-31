<?php

namespace App\Filament\Resources\DataBarangResource\Pages;

use App\Filament\Resources\DataBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataBarangs extends ListRecords
{
    protected static string $resource = DataBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
