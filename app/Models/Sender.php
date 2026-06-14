<?php

namespace App\Models;

use Database\Factories\SenderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    /** @use HasFactory<SenderFactory> */
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'address',
        'representative',
        'contact',
        'telephone',
        'mobile',
        'fax',
        'email',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function letters()
    {
        return $this->hasMany(Letter::class, 'sender_id');
    }
}
