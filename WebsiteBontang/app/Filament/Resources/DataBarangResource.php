<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Barang;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\DataBarangResource\Pages;
use App\Filament\Resources\DataBarangResource\RelationManagers;

class DataBarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Barang')
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->label('Slug')
                    ->maxLength(255)
                    ->unique(Barang::class, 'slug', fn ($record) => $record),

                Forms\Components\RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required(),

                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->label('Harga')
                    ->numeric()
                    ->minValue(0)
                    ->maxLength(255),

                Forms\Components\TextInput::make('stok')
                    ->required()
                    ->label('Stok')
                    ->numeric()
                    ->minValue(0)
                    ->maxLength(255),

                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar')
                    ->required()->image()->disk('public'),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Barang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stok')
                    ->label('Stok')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    
                
                    ->width(50)
                    ->height(50),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->after(
                    function (Collection $records) {
                        foreach ($records as $record) {
                            if ($record->gambar) {
                                Storage::disk('public')->delete($record->gambar);
                            }
                        }
                    }
                ),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataBarangs::route('/'),
            'create' => Pages\CreateDataBarang::route('/create'),
            'edit' => Pages\EditDataBarang::route('/{record}/edit'),
        ];
    }
}
