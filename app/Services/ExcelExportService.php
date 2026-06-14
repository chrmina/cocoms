<?php

namespace App\Services;

use App\Exports\LettersExport;
use App\Exports\WorkPackagesExport;
use App\Exports\SendersExport;
use App\Exports\RecipientsExport;
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

    public function exportSenders($senders): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new SendersExport($senders), 'senders_' . date('Y-m-d_H-i-s') . '.xlsx');
    }

    public function exportRecipients($recipients): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new RecipientsExport($recipients), 'recipients_' . date('Y-m-d_H-i-s') . '.xlsx');
    }
}
