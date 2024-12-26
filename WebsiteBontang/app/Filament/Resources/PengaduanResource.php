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
        // Strip out HTML tags and limit the length of the text
        $keterangan = strip_tags($record->keterangan);
        return Str::limit($keterangan, 50); // Show only the first 50 characters
    })
    ->extraAttributes(function (Pengaduan $record) {
        // Add a custom click event to show the full description in a modal/card
        return [
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#keteranganModal' . $record->id,
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
        ->filters([ /* Tambahkan filter jika diperlukan */ ])
        ->actions([ /* Tambahkan aksi jika diperlukan */ ])
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
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
