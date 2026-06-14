<?php

namespace App\Models;

use Database\Factories\LetterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    /** @use HasFactory<LetterFactory> */
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'sender_id',
        'recipient_id',
        'work_package_id',
        'filelink',
        'file_dir',
        'docref',
        'subject',
        'contents',
        'docdate',
        'confidential',
        'replyreq',
        'tag_count',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'docdate' => 'date',
            'confidential' => 'boolean',
            'replyreq' => 'boolean',
        ];
    }

    public function sender()
    {
        return $this->belongsTo(Sender::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(Recipient::class, 'recipient_id');
    }

    public function workPackage()
    {
        return $this->belongsTo(WorkPackage::class, 'work_package_id');
    }

    public function tags()
    {
        return $this->hasManyThrough(
            Tag::class,
            TaggedItem::class,
            'fk_id',
            'id',
            'id',
            'tag_id'
        )->where('tags_tagged.fk_table', 'letters');
    }

    public function taggedItems()
    {
        return $this->hasMany(TaggedItem::class, 'fk_id')->where('fk_table', 'letters');
    }
}
