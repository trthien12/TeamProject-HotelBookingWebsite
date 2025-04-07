<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_type',
        'room_category',
        'area',
        'view',
        'original_price',
        'discounted_price',
        'available_rooms',
        'image', 
    ];
}