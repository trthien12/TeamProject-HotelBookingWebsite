<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBookingDetail extends Model
{
    use HasFactory;
    protected $table = 'room_booking_detail';
    protected $fillable = [
        'room_id','booking_id'
    ];   
    public function room()
    {
        return $this->belongsTo(RoomDetail::class, 'room_id');
    }
    public function booking()
    {
        return $this->belongsTo(RoomBooking::class, 'booking_id');
    }
}
