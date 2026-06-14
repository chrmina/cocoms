<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\TaggedItem;
use Illuminate\Pagination\LengthAwarePaginator;

class TagService
{
    public function getAllTags(int $perPage = 15): LengthAwarePaginator
    {
        return Tag::withCount('taggedItems')
            ->orderByDesc('counter')
            ->paginate($perPage);
    }

    public function getTagById(string $id): Tag
    {
        return Tag::with('taggedItems')->findOrFail($id);
    }

    public function createTag(array $data): Tag
    {
        $data['id'] = \Illuminate\Support\Str::uuid();
        $data['tag_key'] = \Illuminate\Support\Str::slug($data['label'] . '-' . uniqid());
        $data['slug'] = \Illuminate\Support\Str::slug($data['label']);
        $data['counter'] = 0;
        $data['created_at'] = now();
        $data['updated_at'] = now();

        return Tag::create($data);
    }

    public function updateTag(Tag $tag, array $data): Tag
    {
        $data['updated_at'] = now();
        $tag->update($data);

        return $tag->fresh('taggedItems');
    }

    public function deleteTag(Tag $tag): bool
    {
        $tag->taggedItems()->delete();

        return $tag->delete();
    }

    public function tagItem(string $tagId, string $itemId, string $itemTable): TaggedItem
    {
        return TaggedItem::create([
            'id' => \Illuminate\Support\Str::uuid(),
            'tag_id' => $tagId,
            'fk_id' => $itemId,
            'fk_table' => $itemTable,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function untagItem(string $tagId, string $itemId, string $itemTable): bool
    {
        return TaggedItem::where('tag_id', $tagId)
            ->where('fk_id', $itemId)
            ->where('fk_table', $itemTable)
            ->delete() > 0;
    }

    public function searchTags(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return Tag::withCount('taggedItems')
            ->where('label', 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{$query}%")
            ->orderByDesc('counter')
            ->paginate($perPage);
    }

    public function getPopularTags(int $limit = 10)
    {
        return Tag::orderByDesc('counter')
            ->limit($limit)
            ->get();
    }
}
