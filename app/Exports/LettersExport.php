<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LettersExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $letters)
    {
    }

    public function collection(): Collection
    {
        return $this->letters;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Subject',
            'From (Sender)',
            'To (Recipient)',
            'Work Package',
            'Document Ref',
            'Document Date',
            'Confidential',
            'Reply Required',
            'Created At',
        ];
    }

    public function map($letter): array
    {
        return [
            $letter->id,
            $letter->subject,
            $letter->sender?->name,
            $letter->recipient?->name,
            $letter->workPackage?->name,
            $letter->docref,
            $letter->docdate?->format('Y-m-d'),
            $letter->confidential ? 'Yes' : 'No',
            $letter->replyreq ? 'Yes' : 'No',
            $letter->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
