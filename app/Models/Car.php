<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function to_string()
    {
        return $this->brand.' '.$this->model.' ('.$this->color.')';
    }

    protected $fillable = ['brand', 'model', 'color', 'year', 'number', 'user_id'];
}
