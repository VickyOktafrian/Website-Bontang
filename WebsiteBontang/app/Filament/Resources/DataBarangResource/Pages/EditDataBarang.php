<?php

namespace App\Filament\Resources\DataBarangResource\Pages;

use Filament\Actions;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\DataBarangResource;

class EditDataBarang extends EditRecord
{
    protected static string $resource = DataBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(Barang $record){
                    if ($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
