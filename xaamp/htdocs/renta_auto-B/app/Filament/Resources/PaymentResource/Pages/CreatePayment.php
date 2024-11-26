<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use App\Models\Reservation;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;

    protected function afterCreate(): void
    {
        $payment = $this->record;

        // Cambiar el estado de la reservación asociada
        $reservation = $payment->reservation;
        $reservation->status = Reservation::CONFIRMED;
        $reservation->save(); // Guardar el cambio en la base de datos

    }
}
