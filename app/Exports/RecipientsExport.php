<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecipientsExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $recipients)
    {
    }

    public function collection(): Collection
    {
        return $this->recipients;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Address',
            'Representative',
            'Contact',
            'Telephone',
            'Mobile',
            'Fax',
            'Email',
            'Letters Count',
        ];
    }

    public function map($recipient): array
    {
        return [
            $recipient->id,
            $recipient->name,
            $recipient->address,
            $recipient->representative,
            $recipient->contact,
            $recipient->telephone,
            $recipient->mobile,
            $recipient->fax,
            $recipient->email,
            $recipient->letters_count ?? 0,
        ];
    }
}
