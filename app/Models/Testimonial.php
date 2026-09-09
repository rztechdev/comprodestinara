<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'role',
        'institution',
        'quote',
        'avatar_path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order', 'asc');
    }

    public function getAvatarUrlAttribute(): string
    {
        if (empty($this->avatar_path)) {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=703a3a&color=ffffff';
        }
        if (str_starts_with($this->avatar_path, 'http://') || str_starts_with($this->avatar_path, 'https://')) {
            return $this->avatar_path;
        }
        return asset('storage/' . $this->avatar_path);
    }
}