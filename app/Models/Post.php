<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Post extends Model
{
    public $with = ['category', 'tags'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostCategory(string $slugCategory, string $slugPost): Post
    {
        return $this->where('slug', $slugPost)
            ->whereHas('category', function ($query) use ($slugCategory) {
                $query->where('slug', $slugCategory);
            })
            ->firstOrFail();
    }

    public function scopeSearch(Builder $query, $keyword)
    {
        $query->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%');
    }

    public function getTags($posts)
    {
        $tags = [];
        foreach ($posts as $post) {
            foreach ($post->tags as $tag) {
                if (!in_array($tag->name, $tags)) {
                    $tags[] = $tag->name;
                }
            }
        }

        return $tags;
    }
}
