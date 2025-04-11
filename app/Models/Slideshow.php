<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;
    protected $table = 'slideshow'; // Đảm bảo tên bảng đúng với DB
    protected $fillable = [
        'S_img', 'caption1', 'caption2'
    ];
    public $timestamps = false;
}
