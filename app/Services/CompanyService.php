<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService
{
    public function getAllCompanies(int $perPage = 15): LengthAwarePaginator
    {
        return Company::withCount(['sentLetters', 'receivedLetters'])
            ->orderBy('name')
            ->paginate($perPage);
    }

    public function getCompanyById(string $id): Company
    {
        return Company::with(['sentLetters', 'receivedLetters'])->findOrFail($id);
    }

    public function createCompany(array $data): Company
    {
        $data['id'] = \Illuminate\Support\Str::uuid();

        return Company::create($data);
    }

    public function updateCompany(Company $company, array $data): Company
    {
        $company->update($data);

        return $company->fresh(['sentLetters', 'receivedLetters']);
    }

    public function deleteCompany(Company $company): bool
    {
        return $company->delete();
    }

    public function searchCompanies(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return Company::withCount(['sentLetters', 'receivedLetters'])
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('contact', 'LIKE', "%{$query}%")
            ->orderBy('name')
            ->paginate($perPage);
    }
}
