<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class, 'ride_id');
    }

    protected $fillable = [
        'user_id',
        'ride_id',
        'booking_date',
        'seats'
    ];
}
