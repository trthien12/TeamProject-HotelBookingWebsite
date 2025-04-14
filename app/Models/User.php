<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'ten',
        'email',
        'email_verified_at',
        'password',
        'role', // Thêm thuộc tính role để phân biệt admin và user
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Kiểm tra nếu người dùng là admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin'; // Kiểm tra nếu role là admin
    }
}
