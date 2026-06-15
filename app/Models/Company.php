<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<CompanyFactory> */
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

    public function sentLetters()
    {
        return $this->hasMany(Letter::class, 'sender_id');
    }

    public function receivedLetters()
    {
        return $this->hasMany(Letter::class, 'recipient_id');
    }

    public function letters()
    {
        return $this->sentLetters()->union($this->receivedLetters()->getQuery());
    }
}
