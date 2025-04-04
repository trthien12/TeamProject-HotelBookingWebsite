<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_type', 'price', 'description', 'status', 'image_url'];
    
    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
