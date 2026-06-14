<?php

namespace App\Services;

use App\Models\Recipient;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipientService
{
    public function getAllRecipients(int $perPage = 15): LengthAwarePaginator
    {
        return Recipient::withCount('letters')
            ->orderBy('name')
            ->paginate($perPage);
    }

    public function getRecipientById(string $id): Recipient
    {
        return Recipient::with('letters')->findOrFail($id);
    }

    public function createRecipient(array $data): Recipient
    {
        $data['id'] = \Illuminate\Support\Str::uuid();

        return Recipient::create($data);
    }

    public function updateRecipient(Recipient $recipient, array $data): Recipient
    {
        $recipient->update($data);

        return $recipient->fresh('letters');
    }

    public function deleteRecipient(Recipient $recipient): bool
    {
        return $recipient->delete();
    }

    public function searchRecipients(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return Recipient::withCount('letters')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('contact', 'LIKE', "%{$query}%")
            ->orderBy('name')
            ->paginate($perPage);
    }
}
