<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected $fillable = [
        'start',
        'destination',
        'start_at',
        'seats',
        'price',
        'user_id'
    ];
}
