<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Letter;
use App\Models\TaggedItem;
use Illuminate\Pagination\LengthAwarePaginator;

class TagService
{
    public function getAllTags(int $perPage = 15): LengthAwarePaginator
    {
        return Tag::addSelect([
            'taggedItems_count' => TaggedItem::selectRaw('COUNT(*)')
                ->whereColumn('tag_id', 'tags_tags.id')
                ->where('fk_table', 'letters')
        ])
            ->orderByDesc('counter')
            ->paginate($perPage);
    }

    public function getTagById(string $id): Tag
    {
        $tag = Tag::with([
            'taggedItems' => function ($query) {
                $query->where('fk_table', 'letters');
            }
        ])->findOrFail($id);

        // Eager load letter relationships with companies
        if ($tag->taggedItems->isNotEmpty()) {
            $letterIds = $tag->taggedItems->pluck('fk_id')->unique();
            $letters = Letter::with(['senderCompany', 'recipientCompany'])
                ->whereIn('id', $letterIds)
                ->get()
                ->keyBy('id');

            $tag->taggedItems->each(function ($taggedItem) use ($letters) {
                if (isset($letters[$taggedItem->fk_id])) {
                    $taggedItem->setRelation('letter', $letters[$taggedItem->fk_id]);
                }
            });
        }

        // Add count for the view check
        $tag->taggedItems_count = $tag->taggedItems->count();

        return $tag;
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
        return Tag::withCount(['taggedItems' => function ($query) {
            $query->where('fk_table', 'letters');
        }])
            ->where('label', 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{$query}%")
            ->orderByDesc('counter')
            ->paginate($perPage);
    }

    public function getPopularTags(int $limit = 10)
    {
        return Tag::withCount(['taggedItems' => function ($query) {
            $query->where('fk_table', 'letters');
        }])
            ->orderByDesc('counter')
            ->limit($limit)
            ->get();
    }
}
