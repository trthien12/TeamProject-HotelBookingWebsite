<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    use HasFactory;
    protected $table = 'room_detail';
    protected $fillable = [
        'room_type', 'bed_type', 'area', 'view', 'price_per_night', 'discount_percent', 'remaining_rooms', 'image_url'
    ];

    public function capacities()
    {
        return $this->hasMany(Capacity::class, 'room_id');
    }

    public function bookings()
    {
        return $this->hasMany(RoomBookingDetail::class, 'room_id');
    }
}