<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkPackageRequest;
use App\Http\Requests\UpdateWorkPackageRequest;
use App\Models\WorkPackage;
use App\Services\WorkPackageService;
use App\Services\ExcelExportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class WorkPackageController extends Controller
{
    public function __construct(private WorkPackageService $workPackageService)
    {
    }

    public function index(): View
    {
        $this->authorize('viewAny', WorkPackage::class);

        $workPackages = $this->workPackageService->getAllWorkPackages();

        return view('work-packages.index', ['workPackages' => $workPackages]);
    }

    public function create(): View
    {
        $this->authorize('create', WorkPackage::class);

        return view('work-packages.create');
    }

    public function store(StoreWorkPackageRequest $request): RedirectResponse
    {
        $this->authorize('create', WorkPackage::class);

        $this->workPackageService->createWorkPackage($request->validated());

        return redirect()->route('work-packages.index')->with('success', 'Work package created successfully.');
    }

    public function show(WorkPackage $workPackage): View
    {
        $this->authorize('view', $workPackage);

        $workPackage = $this->workPackageService->getWorkPackageById($workPackage->id);

        return view('work-packages.show', ['workPackage' => $workPackage]);
    }

    public function edit(WorkPackage $workPackage): View
    {
        $this->authorize('update', $workPackage);

        $workPackage = $this->workPackageService->getWorkPackageById($workPackage->id);

        return view('work-packages.edit', ['workPackage' => $workPackage]);
    }

    public function update(UpdateWorkPackageRequest $request, WorkPackage $workPackage): RedirectResponse
    {
        $this->authorize('update', $workPackage);

        $this->workPackageService->updateWorkPackage($workPackage, $request->validated());

        return redirect()->route('work-packages.show', $workPackage)->with('success', 'Work package updated successfully.');
    }

    public function destroy(WorkPackage $workPackage): RedirectResponse
    {
        $this->authorize('delete', $workPackage);

        $this->workPackageService->deleteWorkPackage($workPackage);

        return redirect()->route('work-packages.index')->with('success', 'Work package deleted successfully.');
    }

    public function exportExcel(ExcelExportService $exportService)
    {
        $this->authorize('viewAny', WorkPackage::class);

        $workPackages = WorkPackage::withCount('letters')->get();

        return $exportService->exportWorkPackages($workPackages);
    }

    public function search(Request $request): View
    {
        $this->authorize('viewAny', WorkPackage::class);

        $query = $request->get('q', '');
        $workPackages = $query
            ? $this->workPackageService->searchWorkPackages($query)
            : collect();

        return view('work-packages.search', [
            'workPackages' => $workPackages,
            'query' => $query,
        ]);
    }
}
