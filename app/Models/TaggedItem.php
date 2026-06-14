<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaggedItem extends Model
{
    protected $table = 'tags_tagged';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'tag_id',
        'fk_id',
        'fk_table',
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

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
