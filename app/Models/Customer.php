<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'license_number',
    ];

    // Relación: Un cliente puede tener muchas reservaciones
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
