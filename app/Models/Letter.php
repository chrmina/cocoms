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

    // Note: sender_id and recipient_id now reference the companies table

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

    public function senderCompany()
    {
        return $this->belongsTo(Company::class, 'sender_id');
    }

    public function recipientCompany()
    {
        return $this->belongsTo(Company::class, 'recipient_id');
    }

    // Aliases for backward compatibility
    public function sender()
    {
        return $this->senderCompany();
    }

    public function recipient()
    {
        return $this->recipientCompany();
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

    public function referencedLetters()
    {
        return $this->belongsToMany(
            Letter::class,
            'letter_references',
            'letter_id',
            'referenced_letter_id',
            'id',
            'id'
        );
    }

    public function referencingLetters()
    {
        return $this->belongsToMany(
            Letter::class,
            'letter_references',
            'referenced_letter_id',
            'letter_id',
            'id',
            'id'
        );
    }
}
