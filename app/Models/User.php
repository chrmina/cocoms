<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'token',
        'token_expires',
        'api_token',
        'activation_date',
        'tos_date',
        'active',
        'is_superuser',
        'role',
    ];

    protected $hidden = [
        'password',
        'api_token',
        'token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activation_date' => 'datetime',
            'tos_date' => 'datetime',
            'token_expires' => 'datetime',
            'active' => 'boolean',
            'is_superuser' => 'boolean',
        ];
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }
}
