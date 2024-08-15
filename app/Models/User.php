<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Các thuộc tính có thể được gán hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'avatar',
        'role',
        'active',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
    ];

    /**
     * Các thuộc tính nên bị ẩn khi serialize.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Các thuộc tính nên được chuyển đổi kiểu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
