<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart'; // Tên bảng
    public $timestamps = false; // Tắt timestamps

    protected $fillable = [
        'session_id', 'room_id', 'check_in', 'check_out', 'adults', 'children', 'quantity'
    ];

    public function room()
    {
        return $this->belongsTo(RoomDetail::class, 'room_id');
    }
}
