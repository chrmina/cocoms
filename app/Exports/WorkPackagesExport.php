<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WorkPackagesExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $workPackages)
    {
    }

    public function collection(): Collection
    {
        return $this->workPackages;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Number',
            'Coordinator',
            'QS',
            'Letters Count',
        ];
    }

    public function map($workPackage): array
    {
        return [
            $workPackage->id,
            $workPackage->name,
            $workPackage->number,
            $workPackage->wp_coordinator,
            $workPackage->wp_qs,
            $workPackage->letters_count ?? 0,
        ];
    }
}
