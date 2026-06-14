<?php

namespace App\Services;

use App\Models\WorkPackage;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkPackageService
{
    public function getAllWorkPackages(int $perPage = 15): LengthAwarePaginator
    {
        return WorkPackage::withCount('letters')
            ->orderBy('name')
            ->paginate($perPage);
    }

    public function getWorkPackageById(string $id): WorkPackage
    {
        return WorkPackage::with('letters')->findOrFail($id);
    }

    public function createWorkPackage(array $data): WorkPackage
    {
        $data['id'] = \Illuminate\Support\Str::uuid();

        return WorkPackage::create($data);
    }

    public function updateWorkPackage(WorkPackage $workPackage, array $data): WorkPackage
    {
        $workPackage->update($data);

        return $workPackage->fresh('letters');
    }

    public function deleteWorkPackage(WorkPackage $workPackage): bool
    {
        return $workPackage->delete();
    }

    public function searchWorkPackages(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return WorkPackage::withCount('letters')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('number', 'LIKE', "%{$query}%")
            ->orderBy('name')
            ->paginate($perPage);
    }
}
