<?php
namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\TransaksiResource\Pages;

class TransaksiResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_order')
                    ->label('Order Date')
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('total_harga')
                    ->label('Total Price')
                    ->sortable()
                    ->money('IDR'), // Adjust the format as needed
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_pengiriman')
                    ->label('Shipping Address')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                // You can define any filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user.name')
                    ->label('Nama')
                    ->disabled(),
                Forms\Components\DatePicker::make('tanggal_order')
                    ->label('Order Date')
                    ->disabled(),
                Forms\Components\TextInput::make('total_harga')
                    ->label('Total Price')
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'canceled' => 'Canceled',
                    ])
                    ->required()
                    ->default('pending'), // Optional: Set a default value
                Forms\Components\TextInput::make('alamat_pengiriman')
                    ->label('Shipping Address')
                    ->disabled(),
            ]);
    }
}
