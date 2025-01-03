<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pengaduan;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PengaduanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengaduanResource\RelationManagers;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

 

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->label('Nama Pelapor')
                ->sortable()
                ->searchable(),
            
            Tables\Columns\TextColumn::make('jenis_laporan')
                ->label('Jenis Laporan')
                ->sortable()
                ->searchable(),

                Tables\Columns\TextColumn::make('keterangan')
                ->label('Keterangan')
                ->sortable()
                ->searchable()
                ->getStateUsing(function (Pengaduan $record) {
                    // Limit the length of the text and strip HTML tags
                    return Str::limit(strip_tags($record->keterangan), 50); // Limit to 50 characters
                })
                ->extraAttributes(function (Pengaduan $record) {
                    // Add a custom click event to show the full description in a modal/card
                    return [
                        'data-bs-toggle' => 'modal',
                        'data-bs-target' => '#keteranganModal' . $record->id,
                    ];
                }),

            Tables\Columns\TextColumn::make('keterangan')
                ->label('Keterangan')
                ->sortable()
                ->searchable()
                ->getStateUsing(function (Pengaduan $record) {
                    // Limit the length of the text and strip HTML tags
                    return Str::limit(strip_tags($record->keterangan), 50); // Limit to 50 characters
                })
                ->extraAttributes(function (Pengaduan $record) {
                    // Make the entire row clickable and store additional data
                    return [
                        'class' => 'cursor-pointer',
                        'data-id' => $record->id, // Store the record ID
                        'data-user' => $record->user->name, // Store user name
                        'data-jenis_laporan' => $record->jenis_laporan, // Store jenis laporan
                        'data-keterangan' => $record->keterangan, // Store full keterangan
                        'data-bukti' => json_encode($record->bukti), // Store image paths as JSON
                    ];
                }),
            
            
     
            
            // Menampilkan gambar bukti menggunakan TextColumn dan mengembalikan HTML
            Tables\Columns\TextColumn::make('bukti_gambar')
            
    ->label('Bukti')
    ->getStateUsing(function (Pengaduan $record) {
        $buktiPaths = json_decode($record->bukti); // Ambil semua path gambar
        $html = '';
        if ($buktiPaths) {
            foreach ($buktiPaths as $path) {
                // Wrap the image in a link to open it in a new tab
                // Use a smaller image for the icon
                $html .= '<a href="' . asset('storage/' . $path) . '" target="_blank">' . 
                            '<img src="' . asset('storage/' . $path) . '" class="w-36 h-36 object-cover " alt="Bukti"/>' .
                         '</a>';
            }
        }
        return $html; // Mengembalikan HTML untuk gambar dengan link
    })
    ->sortable()
    ->searchable()
    ->html(), // Menginstruksikan untuk menginterpretasikan HTML yang dikembalikan



            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->sortable()
                ->dateTime('d M Y, H:i'),
        ])
        ->filters([  ])
        ->actions([  ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}



    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengaduans::route('/'),
            // 'create' => Pages\CreatePengaduan::route('/create'),
            // 'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
