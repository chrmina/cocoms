<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use App\Services\ExcelExportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(private CompanyService $companyService)
    {
    }

    public function index(): View
    {
        $this->authorize('viewAny', Company::class);

        $companies = $this->companyService->getAllCompanies();

        return view('companies.index', ['companies' => $companies]);
    }

    public function create(): View
    {
        $this->authorize('create', Company::class);

        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $this->authorize('create', Company::class);

        $this->companyService->createCompany($request->validated());

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show(Company $company): View
    {
        $this->authorize('view', $company);

        $company = $this->companyService->getCompanyById($company->id);

        return view('companies.show', ['company' => $company]);
    }

    public function edit(Company $company): View
    {
        $this->authorize('update', $company);

        $company = $this->companyService->getCompanyById($company->id);

        return view('companies.edit', ['company' => $company]);
    }

    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $this->authorize('update', $company);

        $this->companyService->updateCompany($company, $request->validated());

        return redirect()->route('companies.show', $company)->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company): RedirectResponse
    {
        $this->authorize('delete', $company);

        $this->companyService->deleteCompany($company);

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }

    public function exportExcel(ExcelExportService $exportService)
    {
        $this->authorize('viewAny', Company::class);

        $companies = Company::withCount(['sentLetters', 'receivedLetters'])->get();

        return $exportService->exportCompanies($companies);
    }

    public function search(Request $request): View
    {
        $this->authorize('viewAny', Company::class);

        $query = $request->input('q', '');
        $companies = $query
            ? $this->companyService->searchCompanies($query)
            : collect();

        return view('companies.search', [
            'companies' => $companies,
            'query' => $query,
        ]);
    }
}
