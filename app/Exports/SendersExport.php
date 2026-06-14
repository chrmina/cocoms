<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SendersExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $senders)
    {
    }

    public function collection(): Collection
    {
        return $this->senders;
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

    public function map($sender): array
    {
        return [
            $sender->id,
            $sender->name,
            $sender->address,
            $sender->representative,
            $sender->contact,
            $sender->telephone,
            $sender->mobile,
            $sender->fax,
            $sender->email,
            $sender->letters_count ?? 0,
        ];
    }
}
