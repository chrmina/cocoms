<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;
    protected $table = 'tags_tags';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'namespace',
        'slug',
        'label',
        'counter',
        'tag_key',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function taggedItems()
    {
        return $this->hasMany(TaggedItem::class, 'tag_id');
    }
}
