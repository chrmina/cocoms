<?php

namespace App\Services;

use App\Models\Sender;
use Illuminate\Pagination\LengthAwarePaginator;

class SenderService
{
    public function getAllSenders(int $perPage = 15): LengthAwarePaginator
    {
        return Sender::withCount('letters')
            ->orderBy('name')
            ->paginate($perPage);
    }

    public function getSenderById(string $id): Sender
    {
        return Sender::with('letters')->findOrFail($id);
    }

    public function createSender(array $data): Sender
    {
        $data['id'] = \Illuminate\Support\Str::uuid();

        return Sender::create($data);
    }

    public function updateSender(Sender $sender, array $data): Sender
    {
        $sender->update($data);

        return $sender->fresh('letters');
    }

    public function deleteSender(Sender $sender): bool
    {
        return $sender->delete();
    }

    public function searchSenders(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return Sender::withCount('letters')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('contact', 'LIKE', "%{$query}%")
            ->orderBy('name')
            ->paginate($perPage);
    }
}
