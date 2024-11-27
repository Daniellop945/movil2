<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const CASH = 'cash';
    const CARD = 'card';
    const TRANSFER = 'transfer';

    protected $fillable = [
        'reservation_id',
        'amount',
        'payment_method',
        'SKU'
    ];

    // Relación: Un pago pertenece a una reservación
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Generar SKU único antes de crear el registro
        static::creating(function ($payment) {
            $payment->SKU = self::generateUniqueSKU();
        });
    }

    /**
     * Generar un SKU único para el pago
     *
     * @return string
     */
    protected static function generateUniqueSKU(): string
    {
        do {
            $sku = 'PAY-' . strtoupper(uniqid()) . '-' . rand(100, 999);
        } while (self::where('SKU', $sku)->exists());

        return $sku;
    }

}
