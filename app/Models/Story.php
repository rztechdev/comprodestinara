<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Story extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'archive_no',
        'read_time',
        'author_name',
        'author_role',
        'excerpt',
        'content',
        'image_path',
        'published_at',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderByDesc('published_at');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image_path)) {
            return asset('assets/img/hd/story-sikka.jpg');
        }
        if (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://')) {
            if (str_contains($this->image_path, 'googleusercontent.com') && !str_contains($this->image_path, '=s') && !str_contains($this->image_path, '=w')) {
                return $this->image_path . '=s0';
            }
            return $this->image_path;
        }
        if (str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }
        return asset('storage/' . $this->image_path);
    }
}