<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CompaniesExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $companies)
    {
    }

    public function collection(): Collection
    {
        return $this->companies;
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
            'Sent Letters Count',
            'Received Letters Count',
        ];
    }

    public function map($company): array
    {
        return [
            $company->id,
            $company->name,
            $company->address,
            $company->representative,
            $company->contact,
            $company->telephone,
            $company->mobile,
            $company->fax,
            $company->email,
            $company->sent_letters_count ?? 0,
            $company->received_letters_count ?? 0,
        ];
    }
}
