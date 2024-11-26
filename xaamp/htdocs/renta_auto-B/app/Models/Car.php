<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'license_plate',
        'year',
        'capacity',
        'fuel_type',
        'daily_rate',
        'is_available',
    ];

    // Relación: Un auto puede tener muchas reservaciones
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    protected $appends = ['brand_model'];

    public function getBrandModelAttribute()
    {
        return $this->brand . ' ' . $this->model . ' | ' . $this->license_plate . ' | ' . $this->year;
    }
}
