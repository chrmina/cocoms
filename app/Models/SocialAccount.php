<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'id',
        'user_id',
        'provider',
        'username',
        'reference',
        'avatar',
        'description',
        'link',
        'token',
        'token_secret',
        'token_expires',
        'active',
        'data',
    ];

    protected function casts(): array
    {
        return [
            'token_expires' => 'datetime',
            'active' => 'boolean',
            'data' => 'json',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
