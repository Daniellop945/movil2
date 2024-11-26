<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('car_id')
                    ->required()
                    ->label('Auto')
                    ->options(Car::all()->pluck('brand_model', 'id'))
                    ->searchable(),
                Select::make('customer_id')
                    ->required()
                    ->label('Cliente')
                    ->options(Customer::all()->pluck('name', 'id'))
                    ->searchable(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('total_cost')
                    ->required()
                    ->prefix('$')
                    ->placeholder('1000,00')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric(),
                Select::make('status')
                    ->required()
                    ->options([
                        Reservation::PENDING => 'Pendiente',
                        Reservation::CONFIRMED => 'Confirmado',
                        Reservation::COMPLETED => 'Completado',
                        Reservation::CANCELLED => 'Cancelado',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name'),
                TextColumn::make('car.brand_model'),
                TextColumn::make('start_date'),
                TextColumn::make('end_date'),
                TextColumn::make('total_cost'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        Reservation::PENDING => 'gray',
                        Reservation::CONFIRMED => 'warning',
                        Reservation::COMPLETED => 'success',
                        Reservation::CANCELLED => 'danger',
                    })
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
