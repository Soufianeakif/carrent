<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name', 'phone', 'duration', 'car_id', 'status'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
