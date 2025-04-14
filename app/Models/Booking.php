<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['ho_ten', 'email', 'sdt', 'nationality', 'room_id', 'check_in', 'check_out', 'adults', 'children'];
}
