<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Wisata;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\WisataResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WisataResource\RelationManagers;

class WisataResource extends Resource
{
    protected static ?string $model = Wisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Forms\Components\TextInput::make('judul')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\FileUpload::make('thumbnail')
                        
                        ->required()->image()->disk('public'),
                        
                        Forms\Components\RichEditor::make('isi')
                            ->required(),
                      
                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul')
                    ->sortable()
                    ->searchable(),
              
                
                Tables\Columns\ImageColumn::make('thumbnail'),
                
     
                    Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime(),
                    Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                
                ])
                ->actions([
                Tables\Actions\EditAction::make(),
                
            ])
            ->bulkActions([
             
                    Tables\Actions\DeleteBulkAction::make()->after(
                        function(Collection $record){
                            foreach(
                                $record as $key =>$value
                            ){
                               if($value->thumbnail){
                                Storage::disk('public')->delete($value->thumbnail);
                               } 
                            }
                        }
                    ),
             
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
            'index' => Pages\ListWisatas::route('/'),
            'create' => Pages\CreateWisata::route('/create'),
            'edit' => Pages\EditWisata::route('/{record}/edit'),
        ];
    }
}