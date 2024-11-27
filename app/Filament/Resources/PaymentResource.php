<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\Reservation;
use Filament\Forms;
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

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('reservation_id')
                    ->required()
                    ->label('Reservación')
                    ->options(function ($get) {
                        // Obtiene la reservación seleccionada
                        $selectedReservation = Reservation::find($get('reservation_id'));

                        // Obtiene las reservaciones pendientes
                        $pendingReservations = Reservation::where('status', Reservation::PENDING)
                            ->get()
                            ->pluck('customer_reservation', 'id');

                        // Incluye la reservación seleccionada si no está en las pendientes
                        if ($selectedReservation && !$pendingReservations->has($selectedReservation->id)) {
                            $pendingReservations[$selectedReservation->id] = $selectedReservation->customer_reservation;
                        }

                        return $pendingReservations;
                    })
                    ->searchable(),
                TextInput::make('amount')
                    ->required()
                    ->prefix('$')
                    ->placeholder('1000,00')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric(),
                Select::make('payment_method')
                    ->required()
                    ->label('Metodo de pago')
                    ->options([
                        Payment::CASH => 'Efectivo',
                        Payment::CARD => 'Tarjeta',
                        Payment::TRANSFER => 'Transferencia',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('SKU'),
                TextColumn::make('reservation.customer_reservation'),
                TextColumn::make('amount'),

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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
