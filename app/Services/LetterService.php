<?php

namespace App\Services;

use App\Models\Letter;
use App\Models\Company;
use App\Models\WorkPackage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;

class LetterService
{
    public function __construct(
        private FileUploadService $fileUploadService,
        private TagService $tagService
    ) {
    }

    public function getAllLetters(int $perPage = 15, string $sortBy = 'docdate', string $sortDir = 'desc'): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->orderBy($sortBy, $sortDir)
            ->paginate($perPage);
    }

    public function getLetterById(string $id): Letter
    {
        return Letter::with('sender', 'recipient', 'workPackage', 'taggedItems.tag', 'referencedLetters')
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

        $letterReferences = $data['letter_references'] ?? [];
        unset($data['letter_references']);

        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $letter = Letter::create($data);

        if (!empty($letterReferences)) {
            $letter->referencedLetters()->attach($letterReferences);
        }

        if (!empty($tags)) {
            foreach ($tags as $tagId) {
                $this->tagService->tagItem($tagId, $letter->id, 'letters');
            }
        }

        return $letter;
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

        $letterReferences = $data['letter_references'] ?? [];
        unset($data['letter_references']);

        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $letter->update($data);

        // Update letter references
        $letter->referencedLetters()->sync($letterReferences);

        // Update tags - delete existing and add new ones
        $letter->taggedItems()->delete();
        if (!empty($tags)) {
            foreach ($tags as $tagId) {
                $this->tagService->tagItem($tagId, $letter->id, 'letters');
            }
        }

        return $letter->fresh(['sender', 'recipient', 'workPackage', 'referencedLetters']);
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

    public function getConfidentialLetters(int $perPage = 15, string $sortBy = 'docdate', string $sortDir = 'desc'): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('confidential', true)
            ->orderBy($sortBy, $sortDir)
            ->paginate($perPage);
    }

    public function getLettersRequiringReply(int $perPage = 15, string $sortBy = 'docdate', string $sortDir = 'desc'): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('replyreq', true)
            ->orderBy($sortBy, $sortDir)
            ->paginate($perPage);
    }

    public function getLettersFrom(string $senderId, int $perPage = 15, string $sortBy = 'docdate', string $sortDir = 'desc'): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('sender_id', $senderId)
            ->orderBy($sortBy, $sortDir)
            ->paginate($perPage);
    }

    public function getLettersTo(string $recipientId, int $perPage = 15, string $sortBy = 'docdate', string $sortDir = 'desc'): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('recipient_id', $recipientId)
            ->orderBy($sortBy, $sortDir)
            ->paginate($perPage);
    }

    public function getLettersFromTo(string $senderId, string $recipientId, int $perPage = 15, string $sortBy = 'docdate', string $sortDir = 'desc'): LengthAwarePaginator
    {
        return Letter::with('sender', 'recipient', 'workPackage')
            ->where('sender_id', $senderId)
            ->where('recipient_id', $recipientId)
            ->orderBy($sortBy, $sortDir)
            ->paginate($perPage);
    }
}
