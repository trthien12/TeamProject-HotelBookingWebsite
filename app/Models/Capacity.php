<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    use HasFactory;
    protected $table = 'capacity';
    public $incrementing = false; // Vì khóa chính là một mảng gồm hai cột
    protected $primaryKey = ['room_id', 'max_capacity'];
    
    public function room()
    {
        return $this->belongsTo(RoomDetail::class, 'room_id');
    }
}
