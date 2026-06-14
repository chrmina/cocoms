<?php

namespace App\Services;

use App\Models\Letter;
use App\Models\Sender;
use App\Models\Recipient;
use App\Models\WorkPackage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;

class LetterService
{
    public function __construct(private FileUploadService $fileUploadService)
    {
    }

    public function getAllLetters(int $perPage = 15): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->latest()
            ->paginate($perPage);
    }

    public function getLetterById(string $id): Letter
    {
        return Letter::with('sender', 'recipient', 'workPackage', 'taggedItems.tag')
            ->findOrFail($id);
    }

    public function createLetter(array $data): Letter
    {
        $data['id'] = \Illuminate\Support\Str::uuid();
        $data['created_at'] = now();
        $data['updated_at'] = now();

        if (isset($data['file']) && $data['file'] instanceof UploadedFile) {
            $upload = $this->fileUploadService->upload($data['file']);
            $data['filelink'] = $upload['path'];
            $data['file_dir'] = $upload['directory'];
            unset($data['file']);
        }

        return Letter::create($data);
    }

    public function updateLetter(Letter $letter, array $data): Letter
    {
        $data['updated_at'] = now();

        if (isset($data['file']) && $data['file'] instanceof UploadedFile) {
            if ($letter->filelink) {
                $this->fileUploadService->delete($letter->filelink);
            }
            $upload = $this->fileUploadService->upload($data['file']);
            $data['filelink'] = $upload['path'];
            $data['file_dir'] = $upload['directory'];
            unset($data['file']);
        }

        $letter->update($data);

        return $letter->fresh(['sender', 'recipient', 'workPackage']);
    }

    public function deleteLetter(Letter $letter): bool
    {
        if ($letter->filelink) {
            $this->fileUploadService->delete($letter->filelink);
        }
        return $letter->delete();
    }

    public function searchLetters(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('subject', 'LIKE', "%{$query}%")
            ->orWhere('contents', 'LIKE', "%{$query}%")
            ->orWhere('docref', 'LIKE', "%{$query}%")
            ->latest()
            ->paginate($perPage);
    }

    public function filterByWorkPackage(string $workPackageId, int $perPage = 15): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('work_package_id', $workPackageId)
            ->latest()
            ->paginate($perPage);
    }

    public function filterByDateRange(\DateTime $startDate, \DateTime $endDate, int $perPage = 15): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->whereDate('docdate', '>=', $startDate)
            ->whereDate('docdate', '<=', $endDate)
            ->latest()
            ->paginate($perPage);
    }

    public function getConfidentialLetters(int $perPage = 15): Paginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('confidential', true)
            ->latest()
            ->paginate($perPage);
    }

    public function getLettersRequiringReply(int $perPage = 15): Paginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('replyreq', true)
            ->latest()
            ->paginate($perPage);
    }
}
