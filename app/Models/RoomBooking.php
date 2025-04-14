<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;
    protected $table = 'room_booking';
    protected $fillable = [
        'check_in', 'check_out'
    ];
    public function details()
    {
        return $this->hasMany(RoomBookingDetail::class, 'booking_id');
    }
}
