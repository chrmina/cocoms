<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLetterRequest;
use App\Http\Requests\UpdateLetterRequest;
use App\Models\Letter;
use App\Models\Tag;
use App\Services\LetterService;
use App\Services\TagService;
use App\Services\ExcelExportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function __construct(
        private LetterService $letterService,
        private TagService $tagService
    ) {
    }

    public function index(): View
    {
        $this->authorize('viewAny', Letter::class);

        $letters = $this->letterService->getAllLetters();

        return view('letters.index', ['letters' => $letters]);
    }

    public function create(): View
    {
        $this->authorize('create', Letter::class);

        return view('letters.create');
    }

    public function store(StoreLetterRequest $request): RedirectResponse
    {
        $this->authorize('create', Letter::class);

        $this->letterService->createLetter($request->validated());

        return redirect()->route('letters.index')->with('success', 'Letter created successfully.');
    }

    public function show(Letter $letter): View
    {
        $this->authorize('view', $letter);

        $letter = $this->letterService->getLetterById($letter->id);

        return view('letters.show', ['letter' => $letter]);
    }

    public function edit(Letter $letter): View
    {
        $this->authorize('update', $letter);

        $letter = $this->letterService->getLetterById($letter->id);

        return view('letters.edit', ['letter' => $letter]);
    }

    public function update(UpdateLetterRequest $request, Letter $letter): RedirectResponse
    {
        $this->authorize('update', $letter);

        $this->letterService->updateLetter($letter, $request->validated());

        return redirect()->route('letters.show', $letter)->with('success', 'Letter updated successfully.');
    }

    public function destroy(Letter $letter): RedirectResponse
    {
        $this->authorize('delete', $letter);

        $this->letterService->deleteLetter($letter);

        return redirect()->route('letters.index')->with('success', 'Letter deleted successfully.');
    }

    public function exportExcel(ExcelExportService $exportService)
    {
        $this->authorize('viewAny', Letter::class);

        $letters = Letter::with('sender', 'recipient', 'workPackage')->get();

        return $exportService->exportLetters($letters);
    }

    public function search(Request $request): View
    {
        $this->authorize('viewAny', Letter::class);

        $query = $request->get('q', '');
        $letters = $query
            ? $this->letterService->searchLetters($query)
            : collect();

        return view('letters.search', [
            'letters' => $letters,
            'query' => $query,
        ]);
    }

    public function attachTag(Request $request, Letter $letter): RedirectResponse
    {
        $this->authorize('update', $letter);

        $request->validate([
            'tag_id' => ['required', 'string', 'exists:tags_tags,id'],
        ]);

        $this->tagService->tagItem($request->tag_id, $letter->id, 'letters');

        return back()->with('success', 'Tag added successfully.');
    }

    public function detachTag(Letter $letter, Tag $tag): RedirectResponse
    {
        $this->authorize('update', $letter);

        $this->tagService->untagItem($tag->id, $letter->id, 'letters');

        return back()->with('success', 'Tag removed successfully.');
    }
}
