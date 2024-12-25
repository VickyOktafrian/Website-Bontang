<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Berita;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BeritaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BeritaResource\RelationManagers;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

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
                        Forms\Components\TextInput::make('author')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('judul_gambar')
                        ->required()
                        ->maxLength(255),
                          
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
                Tables\Columns\TextColumn::make('author'),
     
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
