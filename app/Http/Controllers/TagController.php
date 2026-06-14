<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function __construct(private TagService $tagService)
    {
    }

    public function index(): View
    {
        $this->authorize('viewAny', Tag::class);

        $tags = $this->tagService->getAllTags();

        return view('tags.index', ['tags' => $tags]);
    }

    public function create(): View
    {
        $this->authorize('create', Tag::class);

        return view('tags.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', Tag::class);

        $request->validate([
            'label' => ['required', 'string', 'max:255', 'unique:tags_tags,label'],
            'namespace' => ['nullable', 'string', 'max:255'],
        ]);

        $this->tagService->createTag($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function show(Tag $tag): View
    {
        $this->authorize('view', $tag);

        $tag = $this->tagService->getTagById($tag->id);

        return view('tags.show', ['tag' => $tag]);
    }

    public function edit(Tag $tag): View
    {
        $this->authorize('update', $tag);

        return view('tags.edit', ['tag' => $tag]);
    }

    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $this->authorize('update', $tag);

        $request->validate([
            'label' => ['required', 'string', 'max:255', 'unique:tags_tags,label,' . $tag->id . ',id'],
            'namespace' => ['nullable', 'string', 'max:255'],
        ]);

        $this->tagService->updateTag($tag, $request->validated());

        return redirect()->route('tags.show', $tag)->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $this->authorize('delete', $tag);

        $this->tagService->deleteTag($tag);

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }

    public function search(Request $request): View
    {
        $this->authorize('viewAny', Tag::class);

        $query = $request->get('q', '');
        $tags = $query
            ? $this->tagService->searchTags($query)
            : collect();

        return view('tags.search', [
            'tags' => $tags,
            'query' => $query,
        ]);
    }
}
