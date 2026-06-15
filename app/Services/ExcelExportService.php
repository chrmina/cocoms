<?php

namespace App\Services;

use App\Exports\LettersExport;
use App\Exports\WorkPackagesExport;
use App\Exports\CompaniesExport;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExportService
{
    public function exportLetters(Collection $letters): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new LettersExport($letters), 'letters_' . date('Y-m-d_H-i-s') . '.xlsx');
    }

    public function exportWorkPackages($workPackages): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new WorkPackagesExport($workPackages), 'work-packages_' . date('Y-m-d_H-i-s') . '.xlsx');
    }

    public function exportCompanies($companies): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new CompaniesExport($companies), 'companies_' . date('Y-m-d_H-i-s') . '.xlsx');
    }

    // Backward compatibility methods
    public function exportSenders($senders): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return $this->exportCompanies($senders);
    }

    public function exportRecipients($recipients): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return $this->exportCompanies($recipients);
    }
}
