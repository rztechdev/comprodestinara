<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Program extends Model
{
    protected $fillable = [
        'target',
        'title',
        'subtitle',
        'description',
        'features',
        'image_path',
        'cta_text',
        'cta_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order', 'asc');
    }

    public function scopeForTarget(Builder $query, string $target): Builder
    {
        return $query->where('target', $target);
    }

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image_path)) {
            return asset('assets/img/hd/sekolah-diskusi.jpg');
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