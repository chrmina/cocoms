<?php

namespace App\Models;

use Database\Factories\WorkPackageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPackage extends Model
{
    /** @use HasFactory<WorkPackageFactory> */
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'number',
        'name',
        'wp_coordinator',
        'wp_qs',
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
        return $this->hasMany(Letter::class, 'work_package_id');
    }
}
